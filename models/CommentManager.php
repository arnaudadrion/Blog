<?php 
class CommentManager extends Manager {
	public function addComment($id_article, $pseudo, $content){
		$requete = "INSERT INTO Comment(pseudo, content, id_article) VALUES (?,?,?)";
		$resultset=$this->getDataBaseConnection()->prepare($requete);
		$resultset->execute([$pseudo, $content, $id_article]);
	}
}