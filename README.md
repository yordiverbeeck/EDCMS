# EDCMS

An easy CMS for when you just want a simple website to be editable by customers.

EDCMS requires (almost) no knowledge of PHP. 

## Getting started
To get started: 

1. Put all files of the 'edcms' folder on server.
2. Run the setup.sql file into your database.
2. Fill in MySQL data in edcms/src/config/config.php .
3. Convert any .html pages you want edcms to be active in to .php pages.
4. At the top of every page include the following rule:
``` 
<?php require 'edcms/edcms.php'; ?>
```
5. In all fields you want editable: convert the text to: 
```
<?php echo getText('nameOfField'); ?>
```
6. In the config.php file, change 'SCANDB' to true and run your pages to import non-existing fields into the database. Then change 'SCANDB' back to false.
7. You should be able to login using admin : admin
