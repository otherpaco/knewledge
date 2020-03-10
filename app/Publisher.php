<?php

namespace App;

use App\Document;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'actors';

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }
}
