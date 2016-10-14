<?php
class DefaultController extends Controller {
	public function defaultAction() {
		header('location:'.CLIENT_ROOT.'/articles/tous/');
	}
}