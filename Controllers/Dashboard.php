<?php 

	class Dashboard extends Controllers{
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

		public function dashboard()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Dashboard - GeekDentalReport";
			$data['page_title'] = "Dashboard - GeekDentalReport";
			$data['page_name'] = "Dashboard";
			$this->views->getView($this,"dashboard",$data);
		}

	}
 ?>