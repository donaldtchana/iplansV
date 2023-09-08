<?php
class connexion{
    public $access;
public function __construct()
{
    try{

        $this->access=new pdo("mysql:host=localhost;port=5785;dbname=demo;charset=utf8",
            "administrator","system");
        $this->access->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_WARNING);
    } catch (Exception $e){
        echo  $e->getMessage();
        die();
    }

}
}


?>