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
		$valid = $this->validate([
			"judul" => [
				"label" => "Judul",
				"rules" => "required|is_unique[movies.judul]",
				"errors" => [
					"required" => "{field} tidak boleh kosong",
					"is_unique" => "{field} film sudah ada",
				],
			],
			"tahun" => [
				"label" => "Tahun",
				"rules" => "required|numeric|less_than_equal_to[2022]",
				"errors" => [
					"required" => "Tahun tidak boleh kosong",
					"numeric" => "Tahun harus berupa angka",
					"less_than_equal_to" =>
						"Tahun harus kurang dari atau sama dengan 2022",
				],
			],
			"penerbit" => [
				"label" => "Penerbit",
				"rules" => "required",
				"errors" => [
					"required" => "Penerbit tidak boleh kosong",
				],
			],
			"sutradara" => [
				"label" => "Sutradara",
				"rules" => "required",
				"errors" => [
					"required" => "Sutradara tidak boleh kosong",
				],
			],
			"poster" => [
				"label" => "Poster",
				"rules" => "required",
				"errors" => [
					"required" => "Poster tidak boleh kosong",
				],
			],
		]);
		if (!$valid) {
			$validation = \Config\Services::validation();
			$data = $validation->getErrors();
			$data["status"] = false;
			echo json_encode($data);
			exit();
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
	public function delete($id)
	{
		$this->moviesModel->delete($id);
		echo json_encode([
			"status" => true,
			"message" => "Data berhasil dihapus",
		]);
	}
}