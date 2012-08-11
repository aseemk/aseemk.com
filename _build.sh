#!/usr/bin/env bash

# This ideally would be all that's needed...
jekyll

# But unfortunately Jekyll doesn't correctly spit out .php files,
# so we generate .html from Jekyll and manually rename to .php:
for i in _site/blog/posts/*.html
do
    mv "$i" "${i%%.html}".php
done

# Another hack: manually copy files that Jekyll is ignoring.
# TODO Figure out how to tell Jekyll to *not* ignore those files.
cp .htaccess _site
cp -r _templates _site
