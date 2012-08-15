# aseemk.com

This is the source code behind [aseemk.com](http://aseemk.com/), the personal
website of Aseem Kishore.

The website is powered entirely by [Jekyll](http://jekyllrb.com), which uses
[Markdown](http://daringfireball.net/projects/markdown/) and
[Liquid](http://www.liquidmarkup.org/) for markup, and is hosted and served by
[GitHub Pages](http://pages.github.com/).

Adding to, updating and deploying this site is as easy as changing this source
and pushing to the `gh-pages` branch. GitHub's
[Pages help](https://help.github.com/categories/20/articles) provides more
details, including support for custom domains and error pages.

## Development

Development of the site could/would/should be as simple as running the Jekyll
server and having it watch for file changes:

    $ jekyll --auto --server

But this site takes advantage of one cool GitHub Pages feature: support for
"clean" [extensionless URLs](http://gh-pages-test.aseemk.com/). Jekyll's
server doesn't seem to support that, so I personally serve the site locally
with the Apache that comes bundled with Mac OS X, and I use a small, simple
`.htaccess` file to mimic GitHub's clean URLs.

Jekyll doesn't copy dotfiles like `.htaccess` into the output directory by
default, but support for an `include` option
[has been added](https://github.com/mojombo/jekyll/pull/261) and is hopefully
[shipped soon](https://github.com/mojombo/jekyll/blob/master/History.txt).
Until then, there's a minimal build script that copies this `.htaccess` file:

    $ make

Unfortunately, this needs to be manually run after each change... for now.
