<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\client;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable =["type","client_id","amount","from","to","created_at"];


 public function client()
 {
     return $this->belongsTo('App\Models\client', 'client_id');
 }
}
