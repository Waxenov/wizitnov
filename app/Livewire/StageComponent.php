<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StageModel;

class StageComponent extends Component
{
    public $title;
    public $describe;
    public $day;

    //создание новой стадии разработки
    public function submitForm()
    {
        StageModel::create([
            'title' => $this->title,
            'describe' => $this->describe,
            'day' => $this->day,
        ]);

        return redirect()->route('project');
    }

    public function render()
    {
        return view('livewire.stage-component');
    }
}
