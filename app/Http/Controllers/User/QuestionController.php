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
     * index画面の表示
     * requestがあった場合は検索を実行しLengthAwarePaginatorインスタンスを返す
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(SerchQuestionsRequest $request)
    {
        $questions = $this->question->fetchQuestion(Auth::id(), $request->all());
        $tag_category = $this->tagCategory->all();
        return view('user.question.index', compact('questions', 'tag_category'));
    }

    /**
     * 新規投稿画面へ遷移
     * tagCategoryモデルを取得し、viewへ渡しています
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag_category = $this->tagCategory->all();
        return view('user.question.create', compact('tag_category'));
    }

    /**
     * questionsテーブルへ新規レコードの登録
     * 登録後indexへリダイレクト
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
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
     * 質問詳細画面へ遷移
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
     * 質問編集画面へ遷移
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->question->find($id);
        $tag_category = $this->tagCategory->all();
        return view('user.question.edit', compact('question', 'tag_category'));
    }

    /**
     * 指定のレコードを更新
     * 更新後indexへリダイレクト
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
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
     * 指定のレコードへ論理削除を実行
     * 削除後はindexへリダイレクト
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->question->find($id)->delete();
        return redirect()->route('question.index');
    }

    /**
     * マイページ画面へ遷移
     *
     * @return \Illuminate\Http\Response
     */
    public function showMypage()
    {
        $questions = $this->question
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('user.question.mypage', compact('questions'));
    }

    /**
     * 新規投稿内容の確認画面へ遷移
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function createConfirm(QuestionsRequest $request)
    {
        $question = $request->all();
        $tag_category = $this->tagCategory
            ->where('id', $question['tag_category_id'])
            ->get();
        return view('user.question.createconfirm', compact('question', 'tag_category'));
    }

    /**
     * 更新投稿内容の確認画面へ遷移
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updateConfirm(QuestionsRequest $request, $id)
    {   
        $updateId = $id;
        $question = $request->all();
        $tag_category = $this->tagCategory
            ->where('id', $question['tag_category_id'])
            ->get();
        return view('user.question.updateconfirm', compact('question', 'tag_category', 'updateId'));
    }
}
