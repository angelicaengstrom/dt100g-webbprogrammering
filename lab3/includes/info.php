<!--
Angelica Engström, anen1805, Laboration 3, 2022-02-21
Erhåller texten för informationssidan
-->
<div id="divInfo">
<h2>Övrig information</h2>
    <ul>
        <li><b>Datum/klockslag: </b><p>
                <?php 
                echo date("Y-m-d h:i:s");
                if(date("l") == date("l", strtotime("Friday"))){
                    echo " - Äntligen Fredag!!";
                } 
                ?>
            </p></li>
        <li><b>Din IP-adress: </b> <p>
            <?php
            //Hämtar super global variabel som erhåller information om ip adress
            echo $_SERVER["REMOTE_ADDR"];
            ?>
        </p></li>
        <li><b>Sökväg/filnamn: </b> <p>
            <?php
            //Hämtar super global variabel som erhåller information om filnamnet för scriptet
            echo $_SERVER["PHP_SELF"];
            ?>
        </p></li>
        <li><b>User agent-sträng: </b> <p>
            <?php
            //Hämtar super global variabel som erhåller information om användar agent sträng
            echo $_SERVER["HTTP_USER_AGENT"];
            ?>
        </p></li>
    </ul>
</div>