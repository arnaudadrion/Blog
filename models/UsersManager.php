<?php
class UsersManager extends Manager{
	public function setUser($pseudo, $password){
		$requete = 'INSERT INTO membres(pseudo, hash) VALUES (?,?)';
		$resultset = $this->getDataBaseConnection()->prepare($requete);
		$resultset->execute($pseudo, $password);
	}

	public function getUser($pseudo){
		$requete = 'SELECT * FROM membres WHERE pseudo=?';
		$resultset = $this->getDataBaseConnection()->prepare($requete);
		$resultset->execute([$pseudo]);
		$user = $resultset->fetch();
		return $user;
	}

	public function setUserSession($pseudo){
		session_start();
		$_SESSION['user'] = $pseudo;
	}

	public function getUserSession(){
		if(array_key_exists('user', $_SESSION)){
			$user=$_SESSION['user'];
		}
		else{
			$user=[];
		}
		return $user;
	}
}