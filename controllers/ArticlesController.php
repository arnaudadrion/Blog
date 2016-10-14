<?php
class ArticlesController extends Controller{
	public function tousAction() {
		$ArticlesManager = new ArticlesManager();
		$infos = $ArticlesManager->nbreArticle();
		$data = compact('infos');	
		new View('articles', $data);	
	}

	public function getAllAction(){
		$ArticlesManager=new ArticlesManager();		
		$articles=$ArticlesManager->getAll();
		echo json_encode($articles);
	}
	
	public function afficherAction(){
		$ArticlesManager=new ArticlesManager();		
		$article=$ArticlesManager->getOne($_GET['id']);
		$data=compact('article');	
		new View('article', $data);
	}

	public function getOneAction(){
		$ArticlesManager=new ArticlesManager();		
		$article=$ArticlesManager->getOne($_GET['id']);
		echo json_encode($article);
	}
}