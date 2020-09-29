<?php
$username = '';
$password = '';

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
        || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password))
{
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Project 03"');
    exit('<h2>Robadobdob\'s Implausible Hodgepoge Odd Blog</h2>Sorry, you must enter something valid');
}
?>
