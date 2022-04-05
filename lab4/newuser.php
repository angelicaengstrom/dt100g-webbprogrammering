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

//Om både namn och lösenord är satt för att skapa en ny användare
if(isset($_POST['username']) && isset($_POST['pwd']) && $_POST['username'] != "" && $_POST['pwd'] != ""){
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    if(strlen($username) > 2 && strlen($username) < 20){
        if(strlen($password) > 4 && strlen($password) < 20){
           $link = mysqli_connect('studentmysql.miun.se', 'anen1805', '6fbxphuk', 'anen1805');
            if(!$link){
                die('Could not connect');
            }

            //Hämtar alla användare med samma användarnamn som den nya användaren försökte skapa
            $sql = "SELECT * from users where name = '" . $username . "';";
            $result = $link->query($sql);
            
            if($result->num_rows == 0){ //Om användarnamnet är ledigt adderas användaren till databasen med ett hashat lösenord
                $date = date("Y-m-d");
                $sql = "INSERT into users(name, creation, password) values ('" . $username . "', '" . $date . "', '" .hash("ripemd160", $password) . "');";
                $link->query($sql);

                //Loggar automatiskt in den nya användaren
                $_SESSION['username'] = $username;
                header("location:index.php");
            }else{ //Om användarnamnet är upptaget
                echo "<script type='text/javascript'>
                alert('Användarnamnet är upptaget!');
                </script>";
            }
            $link->close();
        }
        else{
            echo "<script type='text/javascript'>
            alert('Lösenordet måste vara mellan 5-20 karaktärer!!');
            </script>";
        }
    }
    else{
        echo "<script type='text/javascript'>
        alert('Användarnamnet måste vara mellan 3-20 karaktärer!');
        </script>";
    }
}
?>
