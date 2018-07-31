<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


use Illuminate\Support\Facades\Hash;

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

    public static function unique($email)
    {
        return !DB::table('users')->where('email', $email)->first();

    }

    public static function create($data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        return DB::table('users')->insert($data);
    }
}
