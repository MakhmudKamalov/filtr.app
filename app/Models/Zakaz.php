<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakaz extends Model
{
  use HasFactory;
  protected $guarded = ['id'];

  protected $hidden = [
    'created_at',
    'updated_at'
  ];

  public function client()
  {
    return $this->belongsTo(Client::class);
  }

  public function filtr()
  {
    return $this->belongsTo(Filtr::class);
  }
}
