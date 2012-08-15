# This build script is only used during devleopment to support copying an
# Apache .htaccess file to mimic GitHub Pages' support for extensionless URLs.
# GitHub Pages does *not* actually call this file.
#
# Jekyll has added an `include` flag to copy files like .htaccess, but this
# update has not been released. TODO Update to that instead when it ships!
# https://github.com/mojombo/jekyll/blob/master/History.txt

default:
	@jekyll
	@cp .htaccess _site
