<div id="navbar">
    <button id="navbtn1" onclick="window.location.href='index.php'">GÄSTBOK V1</button>
    <button id="navbtn2" onclick="window.location.href='page2.php'">GÄSTBOK V2</button>
<!--Olika knappar dyker upp i navigationsfältet ifall användaren är inloggad eller inte.
Det ska inte kunna gå att logga in/skapa användare om användaren redan är inloggad.
Om användaren är utloggad ska det inte kunna gå att 'logga ut'.-->
<?php if(isset($_SESSION['username'])){ ?>
    <button id="navbtn3" onclick="window.location.href='includes/logout.php'">Logga ut</button>
<?php } 
else { ?>
    <button id="navbtn3" onclick="window.location.href='login.php'">LOGGA IN</button>
    <button id="navbtn4" onclick="window.location.href='newuser.php'">NY ANVÄNDARE</button>
<?php } ?>

</div>