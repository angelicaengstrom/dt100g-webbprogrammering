<!--
Angelica Engström, anen1805
DT100G
Laboration 4
2022-03-04
-->
<?php 
session_start();

include("includes/header.php");
include("includes/navbar.php");
include("includes/userfields.php");
include("includes/footer.php");

//Om textfältet för användarnamn är satt
if(isset($_POST['username']) && $_POST['username'] != ""){
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    $link = mysqli_connect('studentmysql.miun.se', 'anen1805', '6fbxphuk', 'anen1805');

    if(!$link){
        die('Could not connect');
    }

    //Hämtar alla med samma namn och samma lösenord
    $sql = "SELECT * from users where name = '" . $username . "' and password = '" . hash("ripemd160", $password) . "';";
    $result = $link->query($sql);
    
    if($result->num_rows == 1){ //Om det kom fram ett resultat med samma användarnamn och lösenord sätts sessionens användarnamn
        $_SESSION['username'] = $username;
        header('location:index.php');
    }
    else{
        echo "Fel användarnamn/lösenord";
    }
}
?>