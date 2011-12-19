<?php
include "setup.php";
include "db.php";

class User {
    public $name;
    public $pwd;
    public $loggedIn;
    
    function login() {
        // db login
        $setup = new Setup();
        $db = new Database($setup->host,$setup->db,$setup->user,$setup->pwd);

        $name = mysql_real_escape_string($this->name);
        $pwd = mysql_real_escape_string($this->pwd);

        $cPwd = crypt($this->pwd,$setup->salt);
        
        //temporary for testings
          $cPwd = $this->pwd;
        //  
        
        $sql="SELECT * FROM users WHERE username='$name' and password='$cPwd'";    
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
        $this->name = stripslashes($n);
        $this->pwd = stripslashes($p);
    }


}

/*

function createUserTable() {
    CREATE TABLE `users` (
    `id` int(4) NOT NULL auto_increment,
    `username` varchar(65) NOT NULL default '',
    `password` varchar(65) NOT NULL default '',
    PRIMARY KEY (`id`)
    ) TYPE=MyISAM AUTO_INCREMENT=2 ;
}
*/

?>
