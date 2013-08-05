// talk.js
// Helper script for talk pages, showing both slides and notes.


// ELEMENTS:

var body = document.body;
var viewport = document.documentElement;
var slidesIframe = document.getElementById('slides');
var notesElmt = document.getElementById('notes');

var SLIDES_WIDTH = slidesIframe.clientWidth;
var SLIDES_HEIGHT = slidesIframe.clientHeight;
var SLIDES_RATIO = SLIDES_WIDTH / SLIDES_HEIGHT;

var MIN_NOTES_WIDTH = 400;
var MIN_NOTES_HEIGHT = 200;


// LAYOUT:

// For best fidelity, we'll always render the #slides iframe at 1024x768, but
// use CSS transform/zoom to shrink it down if needed. (We won't scale up.)

// If the window is landscape/widescreen, we'll render the notes on the side.
// If it's portrait/tall, we'll render the notes along the bottom.
// If it's square (more precisely, close to the 1024x768 aspect ratio of the
// slides), we'll err on the side of rendering the notes on the side.

// From the CSS, we expect that both the slides and the notes are already
// absolutely positioned, and the slides are already set to 1024x768.

function render() {
    var viewportWidth = viewport.clientWidth;
    var viewportHeight = viewport.clientHeight;
    var viewportRatio = viewportWidth / viewportHeight;
    var viewportWider = viewportRatio >= SLIDES_RATIO;

    // update the body's class based on whether we're portrait or landscape:
    body.className = viewportWider ? 'landscape' : 'portrait';

    // what are our constraining width and height?
    // either way, be sure to leave enough room for the notes.
    var maxSlidesWidth = Math.min(SLIDES_WIDTH, viewportWidth);
    if (viewportWider) {
        maxSlidesWidth = Math.min(maxSlidesWidth, viewportWidth - MIN_NOTES_WIDTH);
    }
    var maxSlidesHeight = Math.min(SLIDES_HEIGHT, viewportHeight);
    if (!viewportWider) {
        maxSlidesHeight = Math.min(maxSlidesHeight, viewportHeight - MIN_NOTES_HEIGHT);
    }
    var maxSlidesRatio = maxSlidesWidth / maxSlidesHeight;
    var maxSlidesWider = maxSlidesRatio >= SLIDES_RATIO;

    // what factor should we scale by?
    var slidesScale = maxSlidesWider ?
        maxSlidesHeight / SLIDES_HEIGHT :
        maxSlidesWidth / SLIDES_WIDTH;

    var props = ['webkitTransform', 'MozTransform', 'msTransform', 'oTransform', 'transform'];
    for (var i = 0; i < props.length; i++) {
        var prop = props[i];
        slidesIframe.style[prop] = 'scale(' + slidesScale + ')';
    }

    // position the notes (if landscape, this means setting width):
    if (viewportWider) {
        notesElmt.style.marginTop = '';
        notesElmt.style.width =
            Math.ceil(viewportWidth - slidesScale * SLIDES_WIDTH) + 'px';
    } else {
        notesElmt.style.width = '';
        notesElmt.style.marginTop =
            -Math.ceil(SLIDES_HEIGHT - slidesScale * SLIDES_HEIGHT) + 'px';
    }
}

window.addEventListener('resize', render);

// XXX FIXME iOS doesn't seem to re-render properly on orientation changes;
// simply reloading the page for now... (at least we update our hash...)
window.addEventListener('orientationchange', function () {
    location.reload();
});

render();


// BEHAVIOR:

var slidesReveal;

// account for both iframe already loaded and not yet loaded cases:
if (slidesIframe.contentWindow.Reveal) {
    initUpdating();
} else {
    slidesIframe.addEventListener('load', initUpdating);
}

// when the iframe has loaded, its Reveal object should be present:
function initUpdating() {
    var iframe = slidesIframe.contentWindow;
    var reveal = slidesReveal = iframe.Reveal;

    // account for both Reveal ready and not yet ready cases:
    if (reveal.getCurrentSlide()) {
        update();
    } else {
        reveal.addEventListener('ready', update);
    }

    // but either way, listen for slide change events:
    reveal.addEventListener('slidechanged', update);

    // map our hash to reveal's -- and set reveal's to ours at load time:
    if (location.hash) {
        iframe.location.hash = location.hash;
    }
    iframe.addEventListener('hashchange', function () {
        location.hash = iframe.location.hash;
    });

    // also forward (replay) keyboard events to reveal:
    document.addEventListener('keydown', function (orig) {
        // XXX simply dispatching the original event to the iframe throws an
        // exception, so manually recreating it. feels super hackish!
        // var copy = iframe.document.createEvent(orig.constructor.name);
        // var props = ['shiftKey', 'altKey', 'ctrlKey', 'metaKey', 'keyCode', 'charCode'];
        // copy.initEvent(orig.type, orig.bubbles, orig.cancelable);
        // for (var i = 0; i < props.length; i++) {
        //     var prop = props[i];
        //     copy[prop] = orig[prop];
        // }
        // iframe.document.body.dispatchEvent(copy);

        // XXX unfortunately, the above doesn't seem to have any effect!
        // so for now, manually reimplementing just left/right support...
        if (orig.shiftKey || orig.altKey || orig.ctrlKey || orig.metaKey) {
            return;
        }

        var handled = true;
        switch (orig.keyCode) {
            case 37: reveal.navigateLeft(); break;
            case 39: reveal.navigateRight(); break;
            default: handled = false;
        }

        if (handled) {
            orig.preventDefault();     // prevent accidental scrolling
        }
    });
}

function update() {
    var slide = slidesReveal.getCurrentSlide();
    var notes = slide.querySelector('aside.notes');
    notesElmt.innerHTML = notes ? notes.innerHTML : '';

    // also reset the scroll to the top, in case the reader scrolled down:
    scrollTo(0, 1);     // y=1 for iOS
}
