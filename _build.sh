#!/usr/bin/env bash
#
# This build script is only used during devleopment to support using the
# built-in Apache web server. GitHub Pages does *not* use this.
#
# TODO It'd be nice to get rid of this and use Jekyll for everything.
# We just need Apache/.htaccess for clean URLs (like GitHub's) for now, but
# Jekyll now supports "including" files like .htaccess. Waiting for update!

jekyll

# Hack: manually copy files that Jekyll is ignoring.
# TODO Get rid of these when we can (see above).
cp .htaccess _site
