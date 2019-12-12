<?php

namespace App;

use App\Author;
use App\Mediatype;
use App\Principal;
use App\Publisher;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }

    public function principals()
    {
        return $this->belongsToMany(Principal::class);
    }

    public function mediatypes()
    {
        return $this->belongsToMany(Mediatype::class);
    }

    public function ressources()
    {
        return $this->belongsToMany(Ressource::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
