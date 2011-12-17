<?php
include "setup.php";
include "db.php";

class User {
    public $name;
    public $pwd;
    public $loggedIn;
    
    function login() {

        // encryption
        $settings = Setup();
        $cPwd = crypt($pwd,$settings.salt);
        
        // db
        $sql="SELECT * FROM $tbl_name WHERE username='$name' and password='$cPwd'";
        $result=mysql_query($sql);

        // Mysql_num_row is counting table row
        $count=mysql_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count==1) {
            $loggedIn = true;
        } else {
            $loggedIn = false;
        }
        return $loggedIn;
    }
    
    function __construct($n, $p) {        
        // To protect MySQL injection
        $name = stripslashes($n);
        $pwd = stripslashes($p);
        $name = mysql_real_escape_string($name);
        $pwd = mysql_real_escape_string($pwd);           
    }
    
}


function createUserTable() {
    CREATE TABLE `users` (
    `id` int(4) NOT NULL auto_increment,
    `username` varchar(65) NOT NULL default '',
    `password` varchar(65) NOT NULL default '',
    PRIMARY KEY (`id`)
    ) TYPE=MyISAM AUTO_INCREMENT=2 ;
}


function createUsersDatabase() {
    $db = new Database($setupHost,$setupDB,$setupUser,$setupPwd);
    createUserTable();
}


function loginForm() {
}


?>


