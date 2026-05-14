<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

class OrderComponent extends Component
{
    public $cargoType;      //тип груза
    public $cargoDescribe;  //описание груза
    public $weight;         //вес груза
    public $readyDate;      //дата готовности
    public $loadPlace;      //место загрузки
    public $unloadPlace;    //место разгрузки
    public $truckType;      //тип кузова

    public function submitForm()
    {
        $user = Auth::user(); //получение данных пользователя для записи в таблицу заказов

        // проверка наличия телефона у пользователя
        if (!$user->phone) {
            return redirect()->route('profile.show'); // перенаправление на страницу профиля, если телефон отсутствует
        } elseif (!$user->surname || !$user->name || !$user->patronymic) {
            return redirect()->route('profile.show'); // перенаправление на страницу профиля, если данные о пользователе отсутствуют
        }

        OrderModel::create([
            'cargo_type' => $this->cargoType,
            'cargo_describe' => $this->cargoDescribe,
            'weight' => $this->weight,
            'ready_date' => $this->readyDate,
            'load_place' => $this->loadPlace,
            'unload_place' => $this->unloadPlace,
            'truck_type' => $this->truckType,
            'surname' => $user->surname,
            'name' => $user->name,
            'patronymic' => $user->patronymic,
            'phone' => $user->phone,
            'login' => $user->login,
            'id_customer' => $user->id,
        ]);

        return redirect()->route('orders');
    }
    public function render()
    {
        return view('livewire.OrderComponent');
    }
}
