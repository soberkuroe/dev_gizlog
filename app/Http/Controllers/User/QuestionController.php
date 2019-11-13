<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\TagCategory;
use App\Http\Requests\User\SerchQuestionsRequest;
use App\Http\Requests\User\QuestionsRequest;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $question;
    protected $tagCategory;

    public function __construct(Question $question, TagCategory $tagCategory)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->tagCategory = $tagCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SerchQuestionsRequest $request)
    {
        $questions = $this->question->fetchQuestion(Auth::id(), $request->all());
        return view('user.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->question->fill($input)->save();
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->question->find($id);
        return view('user.question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->question->find($id);
        return view('user.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request, $id)
    {
        $input = $request->all();
        $this->question->find($id)->fill($input)->save();
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->question->find($id)->delete();
        return redirect()->route('question.index');
    }

    public function showMypage()
    {
        $questions = $this->question->where('user_id', Auth::id())
                          ->orderBy('created_at', 'desc')->get();
        return view('user.question.mypage', compact('questions'));
    }

    public function confirm(QuestionsRequest $request)
    {
        $question = $request->all();
        $tag_category = $this->tagCategory->where('id', $question['tag_category_id'])->get();
        return view('user.question.confirm', compact('question', 'tag_category'));
    }
}
