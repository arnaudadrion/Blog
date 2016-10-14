<?php
class ArticlesManager extends Manager {
	public function getAll(){
		$requete='SELECT Articles.id,titre, contenu, date_redaction 
				FROM Articles';
		$resultset= $this->getDataBaseConnection()->query($requete);
		$articles=$resultset->fetchAll();
		return $articles;
	}
	public function getOne($id){
		$requete='SELECT Articles.id,titre, contenu, date_redaction, Commentaires.id, pseudo, content 
				FROM Articles LEFT JOIN Commentaires ON Articles.id=id_article WHERE Articles.id=?';
		$resultset=$this->getDataBaseConnection()->prepare($requete);
		$resultset->execute([$id]);
		$article=$resultset->fetchAll();
		return $article;
	}
	public function nbreArticle(){
		$requete = 'SELECT id FROM Articles';
		$resultset = $this->getDataBaseConnection()->query($requete);
		$infos = $resultset->fetchAll();
		return $infos;
	}
}