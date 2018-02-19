<?php

namespace App;

<<<<<<< HEAD
use Illuminate\Notifications\Notifiable;
=======

>>>>>>> parent of 0fbe177... run back
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
<<<<<<< HEAD
    use Notifiable;
=======

>>>>>>> parent of 0fbe177... run back
    protected $guard = 'admin';

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
<<<<<<< HEAD
=======

  //   public function sendPasswordResetNotification($token)
  // {
  //     $this->notify(new AdminResetPasswordNotification($token));
  // }
>>>>>>> parent of 0fbe177... run back
}
