<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model {

	use HasFactory;

	public function members() {
		return $this->hasMany(Member::class);
	}

	public function devices() {
		return $this->hasMany(Device::class);
	}

	public function theses() {
		return $this->hasMany(Thesis::class);
	}

	public function research() {
		return $this->hasMany(Research::class);
	}
	public function events() {
		return $this->hasMany(Event::class);
	}

}
