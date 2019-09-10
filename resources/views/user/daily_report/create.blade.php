@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
  {!! Form::open(['route' => 'report.store']) !!}
    <div class="form-group form-size-small">
    {!! Form::input('date', 'reporting_time', Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) !!}
    <span class="help-block"></span>
    </div>
    <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
      {!! Form::text('title', null , ['required', 'class' => 'form-control', 'placeholder' =>'Title']) !!}
      @if ($errors->has('title'))
      <span class="help-block">{{ $errors->first('title') }}</span>
      @endif
    </div>
    <div class="form-group @if(!empty($errors->first('contents'))) has-error @endif">
      {!! Form::textarea('contents' , null ,['required', 'class' => 'form-control', 'placeholder' =>'Content']) !!}
      @if ($errors->has('contents'))
      <span class="help-block">{{ $errors->first('contents') }}</span>
      @endif
    </div>
    {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
  {!! Form::close() !!}
  </div>
</div>

@endsection

