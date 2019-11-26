@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <img src="{{ $question->user->avatar }}" class="avatar-img">
      <p>{{ $question->user->name }}&nbsp;さんの質問&nbsp;&nbsp;(&nbsp;&nbsp;{{ $question->tagCategory->name }}&nbsp;&nbsp;)&nbsp;&nbsp;{{ $question->created_at->format('Y-m-d H:i') }}</p>
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
    @foreach($question->comments as $comment)
    <div class="comment-list">
        <div class="comment-wrap">
          <div class="comment-title">
            <img src="{{ $comment->user->name }}" class="avatar-img">
            <p>{{ $comment->user->name }}</p>
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
        <img src="{{ $question->user->avatar }}" class="avatar-img"><p>コメントを投稿する</p>
      </div>
      <div class="comment-body">
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Add your comment...']) !!}
        @if($errors->has('comment'))
        <span class="help-block">{{ $errors->first('comment') }}</span>
        @endif
        </div>
      </div>
      <div class="comment-bottom">
        {!! Form::button('<i class="fa fa-pencil" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
      </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection