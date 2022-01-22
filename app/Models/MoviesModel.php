<?php

namespace App\Models;

use CodeIgniter\Model;

class MoviesModel extends Model
{
	protected $table = "movies";
	protected $primaryKey = "ID";
	protected $useTimestamps = true;
	protected $createdField = "CREATED_AT";
	protected $updatedField = "UPDATED_AT";
	protected $allowedFields = [
		"JUDUL",
		"TAHUN",
		"PENERBIT",
		"SUTRADARA",
		"IMAGE",
		"SLUG",
	];

	public function findBySlug($slug)
	{
		if (!$slug) {
			return $this->findAll();
		}
		return $this->where(["SLUG" => $slug])->first();
	}
}