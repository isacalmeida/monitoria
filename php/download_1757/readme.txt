###############################################################################
# 452 Productions Internet Group (http://www.452productions.com)
# 452 Download tracker  v1.0 
#    This script is freeware and is realeased under the GPL
#    Copyright (C) 2000  452 Productions
#
#    This program is free software; you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation; either version 2 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program; if not, write to the Free Software
#    Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
#    Or just download it http://www.fsf.org/
###############################################################################
Welcome to the read me document for the 452 Download tracker. You'll
be pleased to know this is a very simple script to set up. Lets get started.

What does this script do? It tracks download so you can see how many
times a file has been downloaded, and when the last time a file was downloaded.

For reasons of sanity this readme is broken into a few sections.
1. Things you need
2. Install procedure
3. Use

Section 1: Things you need
MySQL (version really not important; make sure it has no dust on it or anything)
PHP 3.0+
Apache/*nix webserver
A web browser

You laugh but some people ask if those are needed.

Files
readme - this very file
download.php - the download script
install.php - the install script
config.inc.php - a blank file

Section 2: Install Procedure
First upload all the scripts to your web server. Place them all in one folder.
Preferably place this script in your root www dir, so it is accessible at
http://www.yoursite.com/download.php, this will make your life simpler
and its how we assume you've set things up.

Next chmod config.inc.php to 666 (rw--rw--rw-)

Now open up install.php

First is the name of the database you wish to use. If you already have a database created for us to use
put the name in. If you do not, put in the name you would like to use, and the program
will attempt to create it for you.

Next is your database password. The default is YES. Very, very, very rarely is this 
the correct password. If you don't know your database pass contact your sysadmin.

Next is your database username. The default of root may work, but if you do not know
your username contact your sysadmin.

Next is your database host. The default of localhost should work on most systems. If you get an error
contact your sysadmin.

Next is the base url. This is your actual domain name, for example: 452productions.com
works. http://www.452productions.com and http://www.452productions.com do not work.
The script will check to make sure that this appears in the name of the
referrer. If you do not have a domain, it needs something that will always be in the URL
your username, if your url is in the form of http://somehost.com/username, is fine.

Next is the dir where the files are stored on your server. This is the dir off 
your www dir. So if the files are in http://www.yoursite.com/src/ and download.php
is at http://www.yoursite.com/download.php then the default of /src/ will work.
Let's say you have your files in http://www.yoursite.com/scripts/etc/ and download.php
in http://www.yoursite.com/scripts/ then your dir would be /etc/

Next is the path. This is the absolute Unix path to your www dir (or where ever
you have put download.php) This should be something like /www/home or /www or 
/www/username/www

A little note. If you put your files in /dir1/ and download.php in /dir2/ it will
not work.  download.php cannot change directories down towards root, it can
go up as many branches as you want, but not down.

Press Go!! and you're done.

Section 3: Use
Use is very simple. Call the script by using a url like
http://www.yoursite.com/download.php?file=blah.zip
The script will look to see if blah.zip exists in the dir you
specified and if it does it records it and sends it to the user.
If it doesn't it exist, the script says oops! You have to 
put the file extension in, if the file is blah.exe but you put
file=blah or file=blah.zip, it won't work.

To see how many times a file has been downloaded just go to download.php
with out a file argument and it is all shown right there for you.

Good luck and enjoy!

Services Dept.
services@452productions.com
http://www.452productions.com
World domination on a global scale(TM)

