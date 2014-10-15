<?php

class HomeController extends BaseController {

	//('/', 'HomeController@showWelcome');
	

	public function showWelcome()
	{
		return View::make('hello');
	}

}
