<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    /**
     * このユーザが所有する投稿
     * microposts() というふうに複数形でメソッド名をつける
     * 
     * UserのインスタンスからそのUserが持つMicropostsを
     * $user->microposts()->get()
     * もしくは $user->microposts
     * という簡単な記述で取得できるようになります。
     */
     public function microposts()
     {
        return $this->hasMany(Micropost::class); 
     }
     
     
     
}
