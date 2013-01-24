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
var MIN_NOTES_HEIGHT = 100;


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

    slidesIframe.style.webkitTransform = 'scale(' + slidesScale + ')';

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
render();


// BEHAVIOR:

// account for both iframe already loaded and not yet loaded cases:
if (slidesIframe.contentWindow.Reveal) {
    initUpdating();
} else {
    slidesIframe.addEventListener('load', initUpdating);
}

// when the iframe has loaded, its Reveal object should be present:
function initUpdating() {
    var iframe = slidesIframe.contentWindow;
    var reveal = iframe.Reveal;
    var slide = reveal.getCurrentSlide();

    // account for both Reveal ready and not yet ready cases:
    if (slide) {
        updateTo(slide);
    } else {
        reveal.addEventListener('ready', onRevealEvent);
    }

    // but either way, listen for slide change events:
    reveal.addEventListener('slidechanged', onRevealEvent);

    // map our hash to reveal's -- and set reveal's to ours at load time:
    if (location.hash) {
        iframe.location.hash = location.hash;
    }
    iframe.addEventListener('hashchange', function () {
        location.hash = iframe.location.hash;
    });
}

function onRevealEvent(event) {
    if (event.currentSlide) {
        updateTo(event.currentSlide);
    }
}

function updateTo(slide) {
    var notes = slide.querySelector('aside.notes');
    notesElmt.innerHTML = notes ? notes.innerHTML : '';
}
