<?php

declare(strict_types=1);

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\SoftDeletes;

=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 0b0f72043b2fb626763c8c34d0b98b2165380d2f

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $is_admin = 0;

    protected $connection = 'mysql';
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function isAdmin()
    {
        if(Auth::check()) {

            if ($this->get('role') == 'Admin') {
                return true;
            }
        }
    }

}
