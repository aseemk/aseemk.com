<?

// lessc.php
// Compiles (using lessphp) the given stylesheet and returns it.
//
// TODO: It would be fantastic to cache the files, of course, but running into
// permissions issues writing the output. Surely there must be a better way...
//
// Usage:
// lessc.php?path=common.less.css
//  - will compile and return common.less.css and cache output at common.css.

require('lessc.inc.php');

// first grab the input path, e.g. path/to/foo.less or path/to/foo.less.css,
// and transform it to an output path, e.g. path/to/foo.css.
// http://stackoverflow.com/a/1724650/132978
$input = $_GET['path'];
$output = $input;
$output = basename($output, '.less.css');   // important: order matters here!
$output = basename($output, '.less');
$output = $output . '.css';

// XXX caching not working; see above. so not caching for now:
// lessc::ccompile($input, $output);
// $output = file_get_contents($output);

$less = new lessc($input);
$output = $less->parse();

header('Content-Type: text/css');
echo $output;

?>
