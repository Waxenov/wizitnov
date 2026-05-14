<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $fillable = [
        'role',         //роль
        'surname',      //фамилия
        'name',         //имя
        'patronymic',   //отчество
        'phone',        //телефон
        'login',        //почта
        'password',     //пароль
        'status',       //доступ
    ];

    protected $hidden = [
        'password',                 //пароль
        'remember_token',           //токен запоминания
        'two_factor_recovery_codes', //коды восстановления
        'two_factor_secret',        //секретный код аунтификации
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
