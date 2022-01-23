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
		if (empty($movieDetail)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException(
				"Movie named $slug not found"
			);
		}
		$data = [
			"title" => $movieDetail["JUDUL"] . " | Project CI4",
			"movie" => $movieDetail,
		];
		return view("movies/detail", $data);
	}
	public function create()
	{
		$data = [
			"title" => "Add Movies | Project CI4",
			"validation" => \Config\Services::validation(),
		];
		return view("movies/create", $data);
	}
	public function save()
	{
		if (
			!$this->validate([
				"judul" => "required|is_unique[movies.judul]",
				"tahun" => "required|numeric|less_than_equal_to[2022]",
				"sutradara" => "required",
				"penerbit" => "required",
				"poster" => "required",
			])
		) {
			$validation = \Config\Services::validation();
			$data = $validation->getErrors();
			$data["status"] = false;
			echo json_encode($data);
			return;
		}
		$dataForm = $this->request->getVar();
		$result = $this->moviesModel->save([
			"JUDUL" => $dataForm["judul"],
			"TAHUN" => $dataForm["tahun"],
			"PENERBIT" => $dataForm["penerbit"],
			"SUTRADARA" => $dataForm["sutradara"],
			"IMAGE" => $dataForm["poster"],
			"SLUG" => url_title($dataForm["judul"], "-", true),
		]);
		if ($result) {
			echo json_encode([
				"status" => true,
				"message" => "Data berhasil disimpan",
			]);
		}
	}
}