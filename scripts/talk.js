// talk.js
// Helper script for talk pages, showing both slides and notes.


// ELEMENTS:

var viewport = document.documentElement;
var slides = document.getElementById('slides');
var notes = document.getElementById('notes');

var SLIDES_WIDTH = slides.clientWidth;
var SLIDES_HEIGHT = slides.clientHeight;
var SLIDES_RATIO = SLIDES_WIDTH / SLIDES_HEIGHT;

var MIN_NOTES_WIDTH = 200;


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

    // what are our constraining width and height?
    var maxSlidesWidth = Math.min(SLIDES_WIDTH, viewportWidth);
    var maxSlidesHeight = Math.min(SLIDES_HEIGHT, viewportHeight);
    var maxSlidesRatio = maxSlidesWidth / maxSlidesHeight;
    var maxSlidesWider = maxSlidesRatio >= SLIDES_RATIO;

    // what factor should we scale by?
    var slidesScale = maxSlidesWider ?
        maxSlidesHeight / SLIDES_HEIGHT :
        maxSlidesWidth / SLIDES_WIDTH;

    slides.style.webkitTransform = 'scale(' + slidesScale + ')';

    // // case 1: viewport is wider than slides:
    // if (viewportWider) {
    //
    //     // what are our constraining width and height?
    //     var maxSlidesWidth = Math.min(SLIDES_WIDTH, viewportWidth - MIN_NOTES_WIDTH);
    //     var maxSlidesHeight = Math.min(SLIDES_HEIGHT, viewportHeight);
    //
    // // case 2: viewport is taller than slides:
    // } else {
    //
    // }
}

window.addEventListener('resize', render);
render();
