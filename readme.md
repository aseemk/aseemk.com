# aseemk.com

This is the source code behind [aseemk.com][], the personal website of Aseem
Kishore.

[aseemk.com]: http://aseemk.com/

The website is powered entirely by [Jekyll][], which uses [Markdown][] and
[Liquid][] for markup, and is hosted and served by [GitHub Pages][].

[Jekyll]: http://jekyllrb.com/
[Markdown]: http://daringfireball.net/projects/markdown/
[Liquid]: http://www.liquidmarkup.org/
[GitHub Pages]: http://pages.github.com/

Adding to, updating and deploying this site is as easy as changing this source
and pushing to the `gh-pages` branch. GitHub [Pages help]() provides more
details, including support for custom domains and error pages.

[Pages help]: https://help.github.com/categories/20/articles

## Development

Development of the site could/would/should be as simple as running the Jekyll
server and having it watch for file changes:

    $ jekyll --auto --server

But this site takes advantage of one cool GitHub Pages feature: support for
"clean" [extensionless URLs][]. Jekyll's server doesn't seem to support that,
so I personally serve the local site with Apache and use the small, simple
`.htaccess` file to mimic GitHub's clean URLs.

[extensionless URLs]: http://gh-pages-test.aseemk.com/

Jekyll doesn't copy dotfiles like `.htaccess` into the output directory by
default, but support for an `include` option [has been added][Jekyll include]
and is hopefully [shipped soon][Jekyll history].
Until then, there's a minimal Makefile that copies this `.htaccess` file:

    $ make

Unfortunately, this needs to be manually run after each change... for now.

[Jekyll include]: https://github.com/mojombo/jekyll/pull/261
[Jekyll history]: https://github.com/mojombo/jekyll/blob/master/History.txt
