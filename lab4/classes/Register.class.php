<!--
Angelica Engström, anen1805
DT100G
Laboration 4
2022-03-04
-->
<?php

class Register {
    private $posts = [];

    public function __construct(){
        if(file_exists("../../writeable/post.data")){ //Om filen existeras hämtas alla inlägg till medlemsarrayen
            $this->posts = unserialize(file_get_contents("../../writeable/post.data"));
        }
    }

    public function addPost(string $name, string $message, string $date){
        $this->posts[] = new Post($name, $message, $date);

        //Lägger innehållet från medlemsarrayen serialiserat
        file_put_contents("../../writeable/post.data", serialize($this->posts));
    }

    public function delPost(int $index){
        unset($this->posts[$index]);

        //Lägger innehållet från medlemsarrayen serialiserat
        file_put_contents("../../writeable/post.data", serialize($this->posts));
    }

    public function getPosts(){
        return $this->posts;
    }
}
?>