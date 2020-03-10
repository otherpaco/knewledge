<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    protected $table = 'actors';

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
