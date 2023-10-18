<?php 

	class Errors extends Controllers{
		public function __construct()
		{
			session_start();
			session_regenerate_id(true);
            if(empty($_SESSION['login']))
            {
                header('Location: '.base_url().'login');
            }
			parent::__construct();
		}

		public function notFound()
		{
			$this->views->getView($this,"error");
		}
	}

	$notFound = new Errors();
	$notFound->notFound();
 ?>