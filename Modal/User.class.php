<?php
class User {
	private  $id;
	private  $email;
	private  $password;
	private  $firstName;
	private  $lastName;
	private  $address;
	private  $postalCode;
	private  $city;
	private  $admin;
	
	public function __construct(array $donnees = array()){
		$this->hydrate($donnees);
	}
	
	
	public final  function setId($id1) {
		$this->id=$id1;
	}
	
	public function getId(){
		return $this->id;
	}
	
	
	public function setEmail($email1){
		$this->email = $email1;	
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	
	public function setPassword($password1){
		$this->password = password_hash($password1,PASSWORD_DEFAULT);
	}
	
	public function getPassword(){
		return $this->password;	
	}
	
	
	public function setFirstName($firstName1){
		$this->firstName = $firstName1;	
	}
	
	public function getFirstName(){
		return $this->firstName;	
	}
	
	
	public function setLastName($lastName1){
		$this->lastName = $lastName1;	
	}
	
	public function getLastName(){
		return $this->lastName;
	}
	
	
	public function setAddress($address1){
		$this->address = $address1;	
	}
	
	public function getAddress(){
		return $this->address;	
	}
	
	
	public function setPostalCode($postalCode1){
		$this->postalCode = $postalCode1;	
	}
	
	public function getPostalCode(){
		return $this->postalCode;	
	}
	
	
	public function setCity($city1){
		$this->city = $city1;	
	}
	
	public function getCity(){
		return $this->city;
	}


    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

	
    public static function login(User $user){

        $_SESSION['user'] = $user;
    }

    public static function logout(){
        session_destroy();
        session_unset();
        unset($_SESSION["user"]);

    }
	
	
	public function hydrate(array $donnees){
		foreach($donnees as $key => $value){
			$method = "set".ucfirst($key);
			$this->$method($value);
		}
	}
}

?>