<?php

require_once('Connection.class.php');
require_once('User.class.php');

class UserManager {

	private $db;

	public function __construct($db1) {
					$db1 = new Connection();
					$this->db = $db1->getConnection();
					
	}

	public function login(User $user) {
        $usersQuery = $this->db->prepare( "SELECT * FROM users WHERE email= :email");
        $usersQuery->execute(array('email' => $user->getEmail()));
        $result =$usersQuery->fetchObject();


        $password_hash = $result->password;

        if(password_verify($_POST['password'],$password_hash)){
            $user =(array)$result;
            $user = new User($user);

            User::login($user);

            return true;
        }

        return false;
    
    }

    public function logout(){
	    User::logout();
    }

	public function create(User $user) {

	  $req = $this->db->prepare(
	    'INSERT INTO users ( lastName, firstName, email, address, postalCode, city, password, admin )
	    VALUES ( :lastName, :firstName, :email, :address, :cp, :city, :password, :admin )'
	    );

	  if(is_null($user->getAdmin()))
	      $user->setAdmin(0);

	    $req->execute(
			array(
				'lastName' => $user->getLastName(),
				'firstName' => $user->getFirstName(),
				'email' => $user->getEmail(),
				'address' => $user->getAddress(),
				'cp' => $user->getPostalCode(),
				'city' => $user->getCity(),
				'password' => $user->getPassword(),
                'admin' => $user->getAdmin()
			)
		);

	}

	public function findAll() {

 		$usersQuery = $this->db->prepare("SELECT * FROM users");
 		$usersQuery->execute();
 		$result =$usersQuery->fetchAll();

 		return $result;
    
	}


	public final  function findOne($id) {


		$usersQuery = $this->db->prepare( "SELECT * FROM users WHERE id =".$id);
 		$usersQuery->execute();
 		$result =$usersQuery->fetchObject();
 		$result = (array)$result;
 		$result = new User($result);

 		return $result;
    
	}

	public final  function update(User $user) {


        $usersQuery = $this->db->prepare("UPDATE users SET lastName = :lastName, 
                                                                    firstName = :firstName, 
                                                                    email = :email, 
                                                                    address = :address, 
                                                                    postalCode = :postalCode, 
                                                                    city= :city, 
                                                                    password =:password 
                                                                     WHERE id=".$user->getId());


        if(!empty($_POST['password'])){
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        }else{
            $password = $user->getPassword();
			$usersQuery->execute(
				array(
					'lastName' => $_POST['lastname'],
					'firstName' => $_POST['firstname'],
					'email' => $_POST['email'],
					'address' =>$_POST['address'],
					'postalCode' => $_POST['postal'],
					'city' => $_POST['city'],
					'password' => $password
				)
			);
		}
	}

	public final function updateRole(User $user){
        $usersQuery = $this->db->prepare("UPDATE users SET admin = :admin
                                                                     WHERE id=".$user->getId());

        $usersQuery->execute(array(
            'admin' => $_POST['admin']
        ));
    }


	public final  function delete(User $user) {

        $usersQuery = $this->db->prepare( "DELETE FROM users WHERE id =".$user->getId());
        $result = $usersQuery->execute();

        return $result;
	}

}

?>