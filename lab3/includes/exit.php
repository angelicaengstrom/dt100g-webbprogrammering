<!--
Angelica Engström, anen1805, Laboration 3, 2022-02-21
Erhåller funktionalitet för utloggning
-->
<?php 
session_start();
//Förstör sessionen och dess satta variabler
if(session_destroy()){
    //Hänvisar användaren till inloggningssidan
    header("location: ../login.php");
}
?>