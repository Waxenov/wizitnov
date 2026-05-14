<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//создание отзыва перевозчику
class ReviewModel extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'id', //номер отзывы
        'user_id', //номер пользователя
        'transporter_id', //номер перевозчика
        'content', //содержание отзыва
        'rating', //рейтинг пользователя
    ];

    //связь с таблицей пользователей
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //связь с таблицей перевозчиков
    public function transporter()
    {
        return $this->belongsTo(User::class, 'transporter_id');
    }
}
