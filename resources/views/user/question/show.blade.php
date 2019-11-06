@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <img src="{{ Auth::user()->avatar }}" class="avatar-img">
      <p>{{ Auth::user()->name }}&nbsp;さんの質問&nbsp;&nbsp;(&nbsp;&nbsp;{{ $question->tagCategory->name }}&nbsp;&nbsp;)&nbsp;&nbsp;{{ $question->created_at->format('Y-m-d H:i') }}</p>
      <p class="question-date"></p>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $question->title }}</td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'>{{ $question->content }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    @foreach ($comments as $comment)
    <div class="comment-list">
        <div class="comment-wrap">
          <div class="comment-title">
            <img src="{{ Auth::user()->avatar }}" class="avatar-img">
            <p>{{ Auth::user()->name }}</p>
            <p class="comment-date">{{ $comment->created_at }}</p>
          </div>
          <div class="comment-body">{{ $comment->comment }}</div>
        </div>
    </div>
    @endforeach
  <div class="comment-box">
    {!! Form::open(['route' => 'comment.store', $question->id]) !!}
      {!! Form::hidden('user_id', '') !!}
      {!! Form::hidden('question_id', $question->id) !!}
      <div class="comment-title">
        <img src="" class="avatar-img"><p>コメントを投稿する</p>
      </div>
      <div class="comment-body">
        <textarea class="form-control" placeholder="Add your comment..." name="comment" cols="50" rows="10"></textarea>
        <span class="help-block"></span>
      </div>
      <div class="comment-bottom">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
      </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection