<?php

class Database {

    private $host;
    private $db;
    private $user;
    private $pwd;
   
    function __construct($h,$d,$us,$pw) {
        $host=$h; // host
        $db=$d; // database
        $user=$us; // user
        $pwd=$pw; // password

        mysql_connect("$host", "$user", "$pwd")or die("cannot connect"); 
        mysql_select_db("$db")or die("cannot select DB");        
    }
    
}

?>
