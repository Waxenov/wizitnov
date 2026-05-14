<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id',               //номер пользователя
        'id_transporter',   //номер перевозчика
        'id_customer',      //номер заказчика
        'status',           //статус заказа
        'cost',             //стоимость
        'accepted_at',      //дата принятия
        'agreed_at',        //дата согласования
        'payable_at',       //дата оплаты
        'departing_at',     //дата отправки
        'delivered_at',     //дата доставки
        'ready_date',       //дата готовности
        'cargo_type',       //тип груза
        'cargo_describe',   //описание груза
        'truck_type',       //тип кузова
        'weight',           //вес груза
        'load_place',       //место загрузки
        'unload_place',     //место разгрузки
        'surname',          //фамилия
        'name',             //имя
        'patronymic',       //отчество
        'phone',            //телефон
        'login',            //почта
    ];
}
