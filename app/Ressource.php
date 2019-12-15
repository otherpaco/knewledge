<?php

namespace App;

use App\Document;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    public function documents()
    {
        return $this->belongsTo(Document::class);
    }
}
