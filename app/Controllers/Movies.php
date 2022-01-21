<?php

namespace App\Controllers;

use App\Models\MoviesModel;

class Movies extends BaseController
{
	protected $moviesModel;
	public function __construct()
	{
		$this->moviesModel = new MoviesModel();
	}

	public function index()
	{
		$data = [
			"title" => "Movies | Project CI4",
		];
		//find all == select * from movies
		$data["movies"] = $this->moviesModel->findAll();

		return view("movies/index", $data);
	}
}