<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FeedbackModel;
use Illuminate\Support\Facades\Auth;

class FeedbackComponent extends Component
{
    public $content;

    //создание отзыва проекта
    public function submitForm()
    {
        $user = Auth::user();

        FeedbackModel::create([
            'content' => $this->content,
            'name' => $user->name,
            'login' => $user->login,
        ]);

        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.feedback-component');
    }
}
