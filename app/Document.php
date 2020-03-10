<?php

namespace App;

use App\Actor;
use App\Author;
use App\Link;
use App\MediaType;
use App\Principal;
use App\Publisher;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $dates = ['release_date'];

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

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

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_code', 'code');
    }

    public function mediaType()
    {
        return $this->belongsTo(MediaType::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
