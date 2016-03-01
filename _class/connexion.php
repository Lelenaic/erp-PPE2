<?php

class Connexion {

    private static $_pdo;

    private static $_query=array();
    
    public static $last_query;
    
    private function __construct() {
        $dsn = 'mysql:dbname='
                .BDD_NAME
                . ';host='
                . BDD_HOST;
        self::$_pdo=new \PDO(
                $dsn, BDD_USER, BDD_PASSWORD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    static public function get() {
        if (!isset(self::$_pdo)) {
            new Connexion();
        }
        return self::$_pdo;
    }
    static public function exec($query){
        return self::get()->exec($query);
    }
    static public function table($query){
        return self::get()->query($query,PDO::FETCH_ASSOC)->fetchAll();        
    }
<<<<<<< HEAD
    
=======
>>>>>>> e6184b2d23724c5b3652ae71495e528d3bd20545
    static public function queryFirst($query){
        $table=self::table($query);
        return $table[0];
    }
}
