<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model {
    protected $fillable = array('filename', 'user_id');
    public function users()
    {
        return $this->hasMany('App\User');
    }


}
