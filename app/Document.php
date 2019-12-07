<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	public function authors() {
		return $this->belongsToMany('Author');	
    }
    
    public function publishers() {
		return $this->belongsToMany('Publisher');	
    }
    
    public function principals() {
		return $this->belongsToMany('Principal');	
    }
    
    public function mediatypes() {
		return $this->belongsToMany('Mediatype');	
    }
    
    public function ressources() {
		return $this->belongsToMany('Ressource');	
    }
    
    public function tags() {
		return $this->belongsToMany('Tag');	
	}
}
