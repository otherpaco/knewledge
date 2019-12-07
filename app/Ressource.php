<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    public function documents() {
		return $this->belongsToMany('Document');
	}
}
