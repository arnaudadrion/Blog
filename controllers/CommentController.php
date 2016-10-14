<?php
class CommentController extends Controller{
	public function addCommentAction(){
		var_dump($_GET['id']);
		$commentManager = new commentManager();
		$commentManager->addComment(trim($_POST['pseudo']), trim($_POST['content']), $_GET['id']);
	}

}