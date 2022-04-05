<!--
Angelica Engström, anen1805
DT100G
Laboration 4
2022-03-04
-->
<?php
session_start();
require_once("classes/Post.class.php");
require_once("classes/Register.class.php");

$register = new Register();

//Skapa inlägg knappen är tryckt
if(isset($_POST['addPost'])){
    if(isset($_SESSION['username'])){ //Om en användare är inloggad läggs användarnamnet som inläggets namn
        $register->addPost($_SESSION['username'], $_POST['message'], date("Y-m-d h:i:s"));
    }
    else{ //Om en användare är utloggad läggs namnet från textfältet som inläggets namn med texten 'Utloggad'
        $register->addPost($_POST['name'] . " <i>(Utloggad)</i>", $_POST['message'], date("Y-m-d h:i:s"));
    }
}

//Radera inlägg knappen är tryckt
if(isset($_REQUEST["delPost"])){
    //Tar bort inlägg beroende på valt index från hemsidan från textfilen
	$register->delPost(intval($_REQUEST["delPost"]));
	unset($_REQUEST["delPost"]);
	header("Location: index.php");
	exit();
}

include("includes/header.php");
include("includes/navbar.php");
include("includes/postfields.php");
include("includes/postsection.php");
include("includes/footer.php");
?>
