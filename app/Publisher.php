<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public function documents() {
		return $this->belongsToMany('Document');
	}
}