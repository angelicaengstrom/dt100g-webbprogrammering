<?php
session_start();
//Förstör sessionen med dess variabler för att sedan omdirigera användaren till inloggningssidan
if(session_destroy()){
    header('location:../login.php');
}
?>