<!--
Angelica Engström, anen1805
DT100G
Laboration 4
2022-03-04
-->
<?php

class Post { 
	private $name;
	private $message;
    private $date;

	public function __construct(string $n, string $m, string $d){
		$this->name = $n;
		$this->message = $m;
        $this->date = $d;
	}
	function setName(string $n){
		$this->name = $n;
	}
	function getName() : string {
		return $this->name;
	}
	function setMessage(string $m){
		$this->message = $m;
	}
	function getMessage() : string {
		return $this->message;
	}
    function setDate(string $d){
		$this->date = $d;
	}
	function getDate() : string {
		return $this->date;
	}
}

?>
