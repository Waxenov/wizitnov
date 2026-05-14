<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StageModel extends Model
{
    use HasFactory;

    protected $table = 'stages';

    protected $fillable = [
        'title', //название стадии разработки
        'describe', //описание стадии разработки
        'day', //день создания стадии
    ];
}
