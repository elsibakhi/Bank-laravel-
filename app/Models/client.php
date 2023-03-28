<?php

namespace App\Models;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_number', 'account_type', 'balance','user_id'
    ];
    public function user()
   {
       return $this->belongsTo('App\Models\User', 'user_id' );
   }


public function transactions()
{
    return $this->hasMany("App\Models\Transaction");
}



}
