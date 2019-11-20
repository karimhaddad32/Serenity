<?php

class App
{
	protected $controller = 'LoginController';
	protected $method = 'index';
	protected $params = [];
	
	public function __construct() {
		$url = $this->parseURL();
		if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {//not logged in
			if (!isset($url[0]) || !preg_match('/login/i', $url[0])) {
				header('location:/Login/index');
				return;
			}
		} else if (isset($_SESSION['user_id'])) {
			if (isset($url[0]) && preg_match('/login/i', $url[0]) && !preg_match('/logout/i', $url[1])) {
				header('location:/Profile/wall');
				return;
			}
		}


		//setting the controller
		if (file_exists('app/controllers/' . $url[0] . 'Controller.php')) {
			$this->controller = $url[0] . 'Controller';
		}
		unset($url[0]);

		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller();

		//setting the action in the controller
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
			}
			unset($url[1]);
		}
		
		//setting the parameters
		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	//return "/controller/action/param1/param2" as
	//array('controller','action','param1','param2')
	public function parseUrl() {
		if (isset($_GET['url'])) {
			return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}

?>
