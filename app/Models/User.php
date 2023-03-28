<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'personal_id',
        'password',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];




    public function client()
    {
        return $this->hasOne('App\Models\client' );
    }

    public function empolyee()
    {
        return $this->hasOne('App\Models\empolyee' );
    }

/**
 * Get all of the comments for the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function complaints()
{
    return $this->hasMany('App\Models\Complaint');
}


/**
 * Get the user associated with the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function profile()
{
    return $this->hasOne(Profile::class);
}
}
