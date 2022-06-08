# Boccarusso.com
## The index
the website in its entirety is based on the SOAP architecture.
The `index.php` file is the main file of it all, it decides every view by dividing the uri in different parts for then putting the slug into a switch that decides the contents.

### the default slugs
The slug is the part of the url after "boccarusso.com/".
If there is nothing or there are the slugs of the default pages it will make them.
The default slugs use a session variable to set the title of the document for then requiring the relative piece of code to process.

### The posts slugs
If the slug doesn't occur in the cases of the switch then it is either an error 404 or a post.
By default it queries the database for the wanted slug and if nothing is found it shows the 404 page

## The main files
### Htaccess
This file redirects every single url to `index.php' which, as alreayd stated, will take care of the view.

### Composer.json
This file lists the versions of the dependencies that heroku uses for running the app.

### Procfile
Important file that contains the information relative the website itself and what heroku has to use.

### Robots.txt
Regulates the behavior of bot on the webpage, useful mostly for SEO and for indicating where the sitemap is.

### Sitemap.xml
Map of the website

### *.sql
These file are used as nothing more than a copy of the database and should be only one.
Their final version will be in the documentation section.

## Backup.sql
The file `backup.sql` contains the backup of the entire database in case anything would happen.

## The parts directory
This directory contains all sub-elements of every single view and page.
The website itself is made of only two view:
1. home.php
2. postview.php

the former is dedicated to all the default slugs of the website: "", "tag" and "tags", "success" and "project" and "projects".
Everyone of thi pages is nothing more than the home but with different content inside.
As we can see in the file the main block of code is the switch that controls the session variable and as we can see it requires different parts based on the case and for certain ones it just outputs some text.

The latter uses the gobal variable `$post`, containing all the article information, created in the index, to display the wanted informations

## The assets directory
This directory contains all of the CSS and JS of the website along with some other few things.

