<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TransportersController extends Controller
{
    public function showTransporters(Request $request)
    {
        $user = $request->user();
        $searchQuery = $request->input('search');

        if (empty($searchQuery)) {
            //запрос пустой - вывод всех перевозчиков
            $transporters = User::role('transporter')->get();
        } else {
            //поиск только из перевозчиков
            $transporters = User::role('transporter')
                ->where(function ($query) use ($searchQuery) {
                    $query->where('id', 'like', "%$searchQuery%")
                        ->orWhere('surname', 'like', "%$searchQuery%")
                        ->orWhere('name', 'like', "%$searchQuery%")
                        ->orWhere('patronymic', 'like', "%$searchQuery%")
                        ->orWhere('phone', 'like', "%$searchQuery%");
                })
                ->get();
        }

        return view('transporters', compact('transporters', 'searchQuery'));
    }
}
