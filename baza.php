<?php
class Baza
{
    private static $baza = 'baza' ;
    private static $host = 'localhost' ;
    private static $korisnickoIme = 'root';
    private static $sifra = '';
     
    private static $con  = null;
     
    public function __construct() {
        die('Nije dozvoljeno!');
    }
     
    public static function povezi()
    {
       // Jedna konekcija za citavu aplikaciju
       if ( null == self::$con )
       {     
        try
        {
          self::$con =  new PDO( "mysql:host=".self::$host.";"."dbname=".self::$baza, self::$korisnickoIme, self::$sifra); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$con;
    }
     
    public static function otkazi()
    {
        self::$con = null;
    }
}
?>