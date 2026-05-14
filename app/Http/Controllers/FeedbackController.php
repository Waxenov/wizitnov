<?php

namespace App\Http\Controllers;

use App\Models\FeedbackModel;

class FeedbackController extends Controller
{
    public function showComments()
    {
        // все записи из базы данных с пагинацией (3 записей на страницу)
        $comments = FeedbackModel::orderBy('created_at', 'desc')->paginate(3);

        return view('welcome', compact('comments'));
    }

    public function erase($id)
    {
        $comments = FeedbackModel::findOrFail($id);
        $comments->delete();
        return redirect()->back();
    }
}
