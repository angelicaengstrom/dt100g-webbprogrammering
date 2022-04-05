<!--
Angelica Engström, anen1805
DT100G
Laboration 4
2022-03-04
-->
<?php

class DBRegister {
    private $posts = [];
    private $link = "";

    public function __construct(){
        $this->link = mysqli_connect('studentmysql.miun.se', 'anen1805', '6fbxphuk', 'anen1805');
        if(!$this->link){ 
            die('Could not connect'); 
        }

        //Hämtar allt innehåll från databasen
        $sql = "select * from guestbooktable;";
        $result = $this->link->query($sql);
        
        if(mysqli_num_rows($result) > 0){
            while($post = mysqli_fetch_array($result)){ //Lägger in alla inlägg i medlemsarrayen
                $this->posts[] = new Post($post["name"], $post["post"], $post["postDate"]);
            }
        }
    }

    public function addPost(string $name, string $message, string $date){
        $this->posts[] = new Post($name, $message, $date);
        
        //Lägger in de nya värdena i databasen
        $sql = "INSERT into guestbooktable values ('" . $name . "', '" . $message . "', '" . $date . "');";
        $this->link->query($sql);
    }

    public function delPost(int $index){
        //Tar bort värdena som är ekvivalent vid medlemsarrayens index
        $sql = "DELETE from guestbooktable where name='" . $this->posts[$index]->getName() . "' and post='" . $this->posts[$index]->getMessage() . "' and postDate='" . $this->posts[$index]->getDate() . "';";
        $this->link->query($sql);
        
        unset($this->posts[$index]);
    }

    public function getPosts(){
        return $this->posts;
    }
}
?>