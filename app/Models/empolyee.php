<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empolyee extends Model
{
    use HasFactory;
    protected $fillable = [
        'task', 'salary', 'user_id'
    ];
    public function user()
   {
       return $this->belongsTo('App\User', 'user_id' );
   }
}
