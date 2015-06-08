<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $fillable = array('date', 'user_id', 'text', 'date_id');
    public function date()
    {
        return $this->belongsTo('App\Date');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
