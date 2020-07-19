<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'bio', 'confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Check that the user is confirmed.
     * 
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Get user messages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserMessages()
    {
        return $this->hasMany(Message::class);
    }
}
