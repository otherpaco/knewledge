<?php

namespace App;

use App\Document;
use Illuminate\Database\Eloquent\Model;

class Mediatype extends Model
{
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
