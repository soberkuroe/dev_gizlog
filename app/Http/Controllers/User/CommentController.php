<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\CommentRequest;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->middleware('auth');
        $this->comment = $comment;
    }

    /**
     * commentsテーブルへ新規レコードの登録
     * 登録後indexへリダイレクト
     *
     * @param  CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->comment->fill($input)->save();
        return redirect()->route('question.index');
    }
}