<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $guarded=['created_at', 'updated_at'];

    protected $dates=[
      'published_at',
    ];
    public function category(){
        return $this->belongsToMany('App\Models\CareerCategory');
    }
}
