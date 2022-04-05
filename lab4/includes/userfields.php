<div id="logindiv">
    <!--formets action bestäms av vilken sida användaren är på.
    Eftersom denna php-kod återanvänds vid både inloggning och skapandet av en ny användare-->
    <form action="<?= basename($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Användarnamn:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="pwd">Lösenord:</label><br>
        <input type="password" id="pwd" name="pwd">
        <!--Texten i knappen blir annorlunda beroende på om sidan är för att skapa ny användare eller vid inloggning-->
        <input id="loginbtn" type="submit" value="<?php 
            if(basename($_SERVER["PHP_SELF"]) == "newuser.php"){
                echo "Skapa användare";
            }else{
                echo "Logga in";
            } ?>">
    </form>