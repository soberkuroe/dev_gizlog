@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['report.update', $reports->id], 'method' => 'PUT']) !!}
      <input class="form-control" name="user_id" type="hidden" value="4">
      <div class="form-group form-size-small">
        {!! Form::date('reporting_time', $reports->reporting_time, ['class' => 'form-control']) !!}
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::input('text', 'title', $reports->title, ['required', 'class' => 'form-control', 'placeholder' =>'Title']) !!}
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::textarea('contents', $reports->contents, ['required', 'class' => 'form-control', 'placeholder' =>'Content']) !!}
      <span class="help-block"></span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection

