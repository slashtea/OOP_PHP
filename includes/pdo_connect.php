<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/2/15
 * Time: 11:38 PM
 * Description: dsn file
 */

// Creating a Database Source Name (DSN).

$dsn = 'mysql:host=localhost;dbname=oophp';
//$dsn = 'mysql:host=localhost;dbname=oophp;port=8889';
//$dsn = 'sqlite:~/public_html/Accessing_Databases_With_OOP_PHP/sqlite/oophp.db';


$db = new PDO($dsn, 'root', 'Australia4ever');