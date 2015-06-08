<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model {
    protected $fillable = array('date', 'user_id');

	public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
