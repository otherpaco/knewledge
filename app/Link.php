<?php

namespace App;

use App\Document;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
