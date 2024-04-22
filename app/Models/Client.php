<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  protected $hidden = [
    'created_at',
    'updated_at'
  ];

  public function zakazs()
  {
    return $this->hasMany(Zakaz::class);
  }
}
