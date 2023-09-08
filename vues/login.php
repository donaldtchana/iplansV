<?php
session_start();
require_once("./include/commandes.php");
require_once("./include/config.php");
$db=new Commandes();

$title = 'accueil';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$url = $_SERVER["REQUEST_URI"];
$query = parse_url($url, PHP_URL_QUERY);
if ($query == "lang=en") {
    $_SESSION["lang"] = "en";
    include_once "./lang/en.php";
} else {
    if ($query == NULL) {
        $lanuage = $_SESSION['lang'] ?? 'fr';
        if ($lanuage == 'en') {
            include_once "./lang/en.php";
        }
        if ($lanuage == 'fr') {
            include_once "./lang/fr.php";
        }
    } else {
        $_SESSION["lang"] = "fr";
        include_once "./lang/fr.php";
    }
}
ob_start();
?>
	<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/assets/css/login.css">

<main>
	<h1><u>CONNEXION</u></h1>
	<form method="post" action="">
<div  class="interface">
	<p>Login <input type="text" name="email" required></p>
	<p>Password <input type="password" name="motdepasse" required ></p><br>
</div>
<div class="envoie">	
	<p>
		<input type="reset" value="Annuler">
		<input type="submit" name="send1" value="Se Connecter">
	</p>
</div>
</form>
</main>
<?php
if(isset($_POST['send1']))
{
    if(!empty(($_POST['email']) and ($_POST['motdepasse'])))
    {
        $email=htmlspecialchars(($_POST['email'])) ;
        $motdepasse=htmlspecialchars(($_POST['motdepasse'])) ;
        $admin=$db->getAdmin($email,$motdepasse);
        if ($admin)
        {

            $_SESSION['login']=$admin;
            echo "<script>
          swal({
          type: 'success',
          text: 'Connexion avec succès...',
          timer: 1000,
          onOpen: function(){
          swal.showLoading()
          }
          }).then(function(){
            window.open('".SITE_URL."/spider','_self');
          });
        </script>";


        }else{
            echo "<script>
      swal({
         type: 'warning',
         text: 'Désolé! Le mot de passe ou le login sont incorrects',
      });
    </script>";
        }
    }

}
?>


<?php
$content = ob_get_clean();
include 'layout.php';
?>
