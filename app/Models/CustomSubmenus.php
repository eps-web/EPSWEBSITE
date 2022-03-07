<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSubmenus extends Model
{
    use HasFactory;
    protected $guarded=[];

  protected $fillable = [
      'title', 'order','url','type','menu_id'
  ];
}
