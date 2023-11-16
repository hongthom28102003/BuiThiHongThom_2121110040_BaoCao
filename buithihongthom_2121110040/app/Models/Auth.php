<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
//     protected $table = '2121110040_auth';

//     protected $fillable = [
//         'username',
//         'email',
//         'password',
//         'roles',
//     ];

    
    // 'providers'=>[
    //     'users'=>[
    //         'driver'=>'eloquent',
    //         'model'=>App\Models\User::class,
    //     ]
    //     ],
// }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = '2121110040_Auth';
    protected $fillable = [
        'username',
        'email',
        'password',
        'roles',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
