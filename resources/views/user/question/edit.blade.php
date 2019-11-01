@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['question.update', $question->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        <select name='tag_category_id' class = "form-control selectpicker form-size-small" id ="pref_id">
          <option value="">Select category</option>
            <option value= "1">front</option>
            <option value= "2">back</option>
            <option value= "3">infra</option>
            <option value= "4">others</option>
        </select>
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="title" name="title" type="text" value="{{ $question->title }}">
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10">{{ $question->content }}</textarea>
        <span class="help-block"></span>
      </div>
      {!! Form::submit('update', ['name' => 'confirm', 'class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

