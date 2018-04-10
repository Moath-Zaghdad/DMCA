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
        'name', 'email', 'password',
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
	 * A user may create many DMCA notices.
	 *
	 * @return \Illuminate\Database\Eloquent\Relation\HasMany
	 */
	public function notices()
	{
		return $this->hasMany(Notice::class);
	}
}
