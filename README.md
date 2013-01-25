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
and pushing to the `gh-pages` branch. [GitHub Pages help][] provides more
details, including support for custom domains and error pages.

[GitHub Pages help]: https://help.github.com/categories/20/articles

## Development

Development of the site could/would/should be as simple as running the Jekyll
server and having it watch for file changes:

    $ jekyll --auto --server

But this site takes advantage of one cool GitHub Pages feature: support for
"clean" [extensionless URLs][]. Jekyll's server doesn't seem to support that,
so I personally serve the local site with Apache and use a rewrite rule to
mimic GitHub's clean URLs.

[extensionless URLs]: http://gh-pages-test.aseemk.com/

That could be achieved via an `.htaccess` file, but Jekyll doesn't copy
dotfiles into the output directory yet. Support for an `include` config
[has been added][Jekyll include] and hopefully [ships soon][Jekyll history].
Until then, I place the rewrite rule in my global Apache config:

[Jekyll include]: https://github.com/mojombo/jekyll/pull/261
[Jekyll history]: https://github.com/mojombo/jekyll/blob/master/History.txt

```
<Directory "/path/to/aseemk.com/_site">
    # XXX This should belong in an .htaccess file inside this directory, but
    # that's not possible to automate with Jekyll right now. TODO FIXME Move
    # this into an .htaccess file when Jekyll ships the `include` config.

    # Important: this .htaccess file is only used during devleopment.
    # GitHub Pages in particular do *not* respect anything in here.
    # Only coincidentally, GitHub Pages supports "clean" extensionless URLs:
    # https://github.com/aseemk/gh-pages-test

    # URL rewriting reference:
    # http://httpd.apache.org/docs/current/mod/mod_rewrite.html
    RewriteEngine On

    # Friendly URLs for blog posts! Note no trailing slash.
    # Important: this matches GitHub's approach. Trailing slashes not allowed!
    # TODO Generalize this to work across all sections?
    RewriteRule ^blog/([^.]+)$ blog/$1.html
</Directory>
```

With this in place, development of the site is just running Jekyll:

    $ jekyll --auto
