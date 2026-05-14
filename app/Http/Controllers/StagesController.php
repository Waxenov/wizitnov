<?php

namespace App\Http\Controllers;

use App\Models\StageModel;

class StagesController extends Controller
{
    public function showStages()
    {
        // все записи из базы данных с пагинацией (5 записей на страницу)
        $stages = StageModel::orderBy('created_at', 'desc')->paginate(5);

        return view('project', compact('stages'));
    }
}
