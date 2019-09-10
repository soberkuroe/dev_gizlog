@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['report.update', $report->id], 'method' => 'PUT']) !!}
      <div class="form-group form-size-small">
        {!! Form::date('reporting_time', $report->reporting_time, ['class' => 'form-control']) !!}
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::input('text', 'title', $report->title, ['required', 'class' => 'form-control', 'placeholder' =>'Title']) !!}
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::textarea('contents', $report->contents, ['required', 'class' => 'form-control', 'placeholder' =>'Content']) !!}
      <span class="help-block"></span>
      </div>
      {!! Form::submit('Update', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

