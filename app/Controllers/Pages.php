<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Welcome to CodeIgniter",
		];
		return view("pages/index", $data);
	}
}