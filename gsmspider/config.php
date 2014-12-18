<?php
/*
*
 *
 * Config file of the spider
 */

$database = "gadgets";
$username = "root";
$password = "root";
$host = "localhost";
$conn = mysqli_connect($host,$username,$password);
if($conn){
   //mysql_select_db($database);
} else {
    die(mysql_errno($conn));
}