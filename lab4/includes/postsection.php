<div id="postsectiondiv">
    <h2>Inlägg:</h2>

    <!--Itererar alla inlägg som hämtas från databasen eller textfilen beroende på om användaren är på index.php eller page2.php-->
    <?php
        foreach($register->getPosts() as $key => $obj){
            echo "<div> ";
            if(isset($_SESSION['username'])){ 
                //Om användaren är inloggad adderas en 'radera inlägg' knapp till deras egna inlägg
                //Om användaren är admin adderas en 'radera inlägg' knapp till alla inlägg
                if($_SESSION['username'] == "admin" || $_SESSION['username'] == $obj->getName()){ ?> 
                    <!--Vid knapptryck omdirigeras användaren till index.php?delPost=$key eller page2.php?delPost=$key
                        $key är indexet som inlägget i $register arrayen har-->
                    <button onclick="window.location.href='<?= basename($_SERVER["PHP_SELF"]); ?>?delPost=<?= $key ?>';"><i class="fa fa-trash"></i></button>
            <?php 
                }
            }
            //Skriver ut meddelande, namn och datum för inlägget
            echo "<h3>" . $obj->getMessage() . "</h3><br>" . $obj->getName() . ", " . $obj->getDate() . "</div><br />";
        }
?>
</div>