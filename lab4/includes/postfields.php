<div id="postdiv">
    <div id="postfieldsdiv">
        <!--formets action bestäms av vilken sida användaren är på. (index.php eller page2.php)
        Eftersom denna php-kod återanvänds vid textfil- och databas-gästboken -->
        <form action="<?= basename($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Namn/Alias: </label>

        <!--Om användaren är inloggad ska det inte gå att ha ett annat namn än användarnamnet-->
        <?php if(isset($_SESSION['username'])){
            echo "<b>" . $_SESSION['username'] . "</b>";
        } 
        else {
        ?>
        <!--Om användaren är utloggad måste användaren fylla i namn i textfältet-->
            <input type="text" id="name" name="name">
        <?php } ?>

        <br><br>

        <label for="message">Meddelande:</label><br>
        <textarea id="messagetxt" name="message" rows="10" cols="30"></textarea><br><br>
        
        <input id="submitbtn" name="addPost" type="submit" value="SKAPA INLÄGG">
        </form>
    </div>