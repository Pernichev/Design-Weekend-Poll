<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['votes_count'];

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
