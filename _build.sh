#!/usr/bin/env bash
#
# This build script is only used during devleopment to support using the
# built-in Apache web server. GitHub Pages does *not* use this.
#
# TODO It'd be nice to get rid of this and use Jekyll for everything.
# We just need Apache/.htaccess for clean URLs (like GitHub's) for now, but
# Jekyll now supports "including" files like .htaccess. Waiting for update!

# This ideally would be all that's needed...
jekyll

# But unfortunately Jekyll doesn't correctly spit out .php files,
# so we generate .html from Jekyll and manually rename to .php:
# TODO Remove this once we port all of our PHP to Liquid layouts.
for i in _site/blog/posts/*.html
do
    mv "$i" "${i%%.html}".php
done

# Another hack: manually copy files that Jekyll is ignoring.
# TODO Get rid of these when we can (see above).
cp .htaccess _site
cp -r _templates _site
