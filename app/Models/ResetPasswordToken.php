<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPasswordToken extends Model
{
    /**
     * the code expiration by seconds.
     *
     * @var int
     */
    public const EXPIRE_DURATION = 50 * 60;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Check if this code has been expired.
     *
     * @return bool
     */
    public function isExpired()
    {
        return $this->updated_at->addSeconds(static::EXPIRE_DURATION)->isPast();
    }

    /**
     * the user who created this token.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
