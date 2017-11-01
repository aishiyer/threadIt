<?php

//this will avoid mysql_connect deprecation error
error_reporting( ~E_DEPRECATED & ~E_NOTICE );

// define('DBHOST' , 'localhost');
// define('DBUSER' , 'root');
// define('DBPASS' , '');
// define('DBNAME' , 'homeworkthreedb');

define('DBHOST' , 'localhost');
define('DBUSER' , 'cs431s10');
define('DBPASS' , 'baonahbu');
define('DBNAME' , 'cs431s10');

$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
$dbcon = mysql_select_db(DBNAME);

if(!$conn)
{
    die("Connection failed : " . mysql_error());
}

if (!$dbcon)
{
    die("Database Connection failed : " . mysql_error());
}

