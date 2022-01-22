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
	public function detail($slug = "null")
	{
		$movieDetail = $this->moviesModel->findBySlug($slug);
		$data = [
			"title" => $movieDetail["JUDUL"] . " | Project CI4",
			"movie" => $movieDetail,
		];
		return view("movies/detail", $data);
	}
}