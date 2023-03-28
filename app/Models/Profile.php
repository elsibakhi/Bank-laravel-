<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model 
{
    use HasFactory ;

    protected $fillable =["email","phone","bio","country","user_id","gender" , "photo"];


/**
 * Get the user that owns the Profile
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
