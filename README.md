# phpBlog
Simple, personal blog developed with PHP

First, you need to create a new mysql database. Actually, first you must have php and mysql installed. That's important. Then create the database. Name it whatever you'd like.

Next, in the database you just created, run the code provided in 'create.sql'.

Then, go into the 'connectvars.php' file and change the username/pwd/db etc values to reflect your own settings.

Go into 'authorize.php' and add your username and password (at the very top). This locks access to your admin page so that only you can add/remove your own posts.

For the sake of cleanliness, I chose not to provide a link to the admin page. You must manually change the url to be blog/admin.php to access it.
