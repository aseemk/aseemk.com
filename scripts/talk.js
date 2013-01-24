// talk.js
// Helper script for talk pages, showing both slides and notes.


// ELEMENTS:

var body = document.body;
var viewport = document.documentElement;
var slides = document.getElementById('slides');
var notes = document.getElementById('notes');

var SLIDES_WIDTH = slides.clientWidth;
var SLIDES_HEIGHT = slides.clientHeight;
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

    slides.style.webkitTransform = 'scale(' + slidesScale + ')';

    // position the notes (if landscape, this means setting width):
    if (viewportWider) {
        notes.style.marginTop = '';
        notes.style.width =
            Math.ceil(viewportWidth - slidesScale * SLIDES_WIDTH) + 'px';
    } else {
        notes.style.width = '';
        notes.style.marginTop =
            -Math.ceil(SLIDES_HEIGHT - slidesScale * SLIDES_HEIGHT) + 'px';
    }
}

window.addEventListener('resize', render);
render();
