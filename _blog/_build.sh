#!/usr/bin/env bash

# This ideally would be all that's needed...
jekyll

# But unfortunately Jekyll doesn't correctly spit out .php files,
# so we generate .html from Jekyll and manually rename to .php:
for i in ../blog/posts/*.html
do
    mv $i ${i%%.html}.php
done