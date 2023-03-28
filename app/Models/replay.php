<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replay extends Model
{
    use HasFactory;

    protected $fillable = ["replay","complaint_id"]; 

/**
 * Get the user that owns the replay
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function complaint(): BelongsTo
{
    return $this->belongsTo(Complaint::class, 'complaint_id');
}

}
