aseemk.com
==========

This is the source code behind [aseemk.com](http://aseemk.com/), the personal
website of Aseem Kishore.

It's a PHP website, which means it's mostly static files with a little bit of
dynamic PHP powering them.

The blog uses [Jekyll](http://jekyllrb.com/), a static website generator.
Because I don't want an entirely static website (I value separation of concerns,
e.g. not having to re-upload every page on my website if I want to make one
small tweak to the HTML of the site's header), I use it only for its blog
features (e.g. Markdown+YAML parsing and aggregating for the index and feed).

To that end, the `_blog` directory is the (Jekyll) source for the blog, while
the `blog` directory is the built output.

Development
-----------

To "build" the blog:

    cd _blog
    ./_build.sh

Run this whenever any of the content inside the `_blog` directory changes.

**Important:** you *must* be inside the `_blog` directory before running the
`_build.sh` script.

This build script is only necessary because of a [Jekyll bug](https://github.com/mojombo/jekyll/issues/139)
that prevents our output posts from retaining their `.php` extension. I hope to
write a simple [Jekyll plugin](https://github.com/mojombo/jekyll/wiki/Plugins)
for this site to work around that bug and make the build script unnecessary.