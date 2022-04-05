<!--
Angelica Engström, anen1805, Laboration 3, 2022-02-21
Erhåller inloggningsfälten och dess funktionalitet
-->
<div id="login">
<form action="login.php" method="post"> <!-- Skickar datan till samma sida för att arbeta med datan vid knapptryck-->
    <p>
        <label>Username:</label>
        <input type="text" id="user" name="user" />
    </p>
    <p>
        <label>Password:</label>
        <input type="password" id="pass" name="pass" />
    </p>
    <p>
        <input type="submit" id="loginbtn" value="Login" />
    </p>
</form>

<?php 
//Kontrollerar att kolumnen är ifylld för användarnamn
if(isset($_POST['user']) && $_POST['user'] != ""){ 
    $username = $_POST["user"];
    $password = $_POST["pass"];

    //Kontrollerar att användarnamn och lösenord är korrekt
    if($username == "admin" && $password == "admin"){ 
        //Sätter sessionsvariabler för den startade sessionen
        $_SESSION['user'] = $username;
        $_SESSION['pass'] = $password;

        //Flyttar användaren till index-sidan
        header("location:index.php");
    }
    else{
        echo "Fel användarnamn/lösenord";
    }

    if(isset($_SESSION['user'])){
        header("location:index.php");
    }
}
?>