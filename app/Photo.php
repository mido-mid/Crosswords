<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $table = 'photoable';

    public $timestamps = false;
	
    protected $fillable = [
    	'filename',
    	'photoable_id',
    	'photoable_type'
    ];
    
    public function photoable() {
    	return $this->morphTo('App\Photo');
    }
}
