<?php
class UsersController extends Controller{
	public function getUser(){
		$userManager= new UsersManager();

	}

	public function setUser(){
		
	}

	public function authentificationAction(){
		$userManager = new UsersManager();
		//var_dump($_POST);
		if(array_key_exists('pseudo', $_POST) && array_key_exists('password', $_POST)){
			$user = $userManager->getUser(trim(htmlspecialchars($_POST['pseudo'])));
			//var_dump($user);
			if(password_verify(htmlspecialchars($_POST['password']), $user['hash'])){
				$userManager->setUserSession($user['pseudo']);
			}
		}		
		echo json_encode($user);
	}
}