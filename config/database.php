<?php
class Database{
    public static function connect(){
        $database = new mysqli('localhost'
                              ,'root'
                              ,''
                              ,'sgcpd');
        $database->query("SET NAMES 'utf8'");

        return $database;
    }
    public static function connectmoodle(){
        $databasemoodle = new mysqli('localhost'
                              ,'root'
                              ,''
                              ,'moodle');
        $databasemoodle->query("SET NAMES 'utf8'");

        return $databasemoodle;
    }
}

?>
