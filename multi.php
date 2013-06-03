<?php

/**
*
* @   Script Name :   multi.php
* @   Author      :   NIKO28
* @   Skype       :   nicolo3767
* @   Project     :   DBOOR Full Decoded
*
**/

define( 'INSIDE', true );
require( '.' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'boot.php' );
require_once( MODEL_PATH . 'multi.php' );
class GPage extends SecureGamePage {
	var $isAdmin = FALSE;

	function GPage() {
		parent::securegamepage(  );
		$this->viewFile = 'multi.phtml';
		$this->contentCssClass = 'player';
	}

	function load() {
		parent::load(  );
		$this->isAdmin = $this->data['player_type'] == PLAYERTYPE_ADMIN;

		if (!$this->isAdmin) {
			exit( 0 );
			return null;
		}

		if(isset($_POST['Submit'])){
			$cd = new Multi ();
			$cd->ban();
		}
	}

}

$p = new GPage(  );
$p->run(  );
?>