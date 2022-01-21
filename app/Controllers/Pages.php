<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Home | Project CI4",
		];
		return view("pages/index", $data);
	}
	public function about()
	{
		$data = [
			"title" => "About | Project CI4",
		];
		return view("pages/about", $data);
	}

	public function contact()
	{
		$data = [
			"title" => "Contact | Project CI4",
		];
		return view("pages/contact", $data);
	}
}