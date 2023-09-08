<?php
require_once "connexion.php";
class Commandes extends connexion {
    function ajouter($image,$nom,$prix,$desc)
    {

            $req=$this->access->prepare(" INSERT INTO produits(image,nom,prix,description) 
 VALUES('$image','$nom',$prix,'$desc') ");
            $req->execute(array($image,$nom,$prix,$desc));
            $req->closeCursor();

    }
    function afficher()
    {


            $req=$this->access->prepare("SELECT * FROM produits ORDER BY id DESC ");
            $req->execute();
            $data=$req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();

    }
    function supprimer($id)
    {
        //   require "connexion.php";
        $req=$this->access->prepare("DELETE  FROM produits WHERE id=? ");
        $req->execute(array($id));
        $req->closeCursor();

    }
    function update($id,$image,$nom,$prix,$desc)
    {
        $req=$this->access->prepare("
        UPDATE produits
        set image='$image', nom='$nom',prix=$prix,description='$desc'
       WHERE id=?
        ") ;

    }
    function getAdmin($email,$password)
    {

        $req=$this->access->prepare(" SELECT * FROM utilisateurs where nom=? and passwords=?") ;
        $req->execute(array($email,$password));
        if ($req->rowCount()==1)
        {
            $data=$req->fetch();
            return $data;
        }else{
            return false;
        }
        $req->closeCursor();

    }
}


?>