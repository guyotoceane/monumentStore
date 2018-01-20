<?php
class Product {
	private  $id;
	private  $name;
	private  $description;
	private  $img;
	private  $optionName;
	private  $optionPrix;
	private  $prix;
	
	public function __construct(array $donnees = array()){
		$this->hydrate($donnees);
	}
	
	public function hydrate(array $donnees){
		foreach($donnees as $key => $value){
			$method = "set".ucfirst($key);
			$this->$method($value);
		}
	}
	
	public final  function setId($id1) {
		$this->id=$id1;
	}
	
	public function getId(){
		return $this->id;
	}
	
	
	public function setName($name){
		$this->name = $name;	
	}
	
	public function getName(){
		return $this->name;
	}
	
	
	public function setDescription($description){
		$this->description = $description;	
	}
	
	public function getDescription(){
		return $this->description;	
	}
	
	
	public function setImg($img){
		$this->img = $img;	
	}
	
	public function getImg(){
		return $this->img;
	}
	
	
	public function setOptionName($optionName){
		$this->optionName = $optionName;	
	}
	
	public function getOptionName(){
		return $this->optionName;	
	}
	
	public function setOptionPrix($optionPrix){
		$this->optionPrix = $optionPrix;	
	}
	
	public function getOptionPrix(){
		return $this->optionPrix;	
	}
	
	
	public function setPrix($prix){
		$this->prix = $prix;	
	}
	
	public function getPrix(){
		return $this->prix;
	}



}

?>