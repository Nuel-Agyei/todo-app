<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $Fillable = ['title', 'description', 'is_completed'];

	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->Fillable;
	}
};
