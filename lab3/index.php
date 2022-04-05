<!--
Angelica Engström, anen1805, Laboration 3, 2022-02-21
Startsidan
-->
<?php
session_start();

//Om sessionsvariabeln för user inte är satt byts sidan till inloggningssidan
if(!isset($_SESSION['user'])){
    header("location:login.php");
}

$page_title = "Startsida"; //Variabel för hemsidans titel
include("includes/header.php");
include("includes/topbar.php");
include("includes/start.php");
include("includes/footer.php"); ?>