<?php

namespace App\Models;

use CodeIgniter\Model;

class MoviesModel extends Model
{
	protected $table = "movies";
	protected $primaryKey = "ID";
	protected $useTimeStamps = true;
	protected $createdField = "CREATED_AT";
	protected $updatedField = "UPDATED_AT";
}