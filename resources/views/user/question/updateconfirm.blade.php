@extends ('common.user')
@section ('content')

<h2 class="brand-header">投稿内容確認</h2>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
    {{ $tagCategoryName->name }}&nbsp;&nbsp;の質問
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $request['title'] }}</td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'>{{ $request['content'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn-bottom-wrapper">
    {!! Form::open(['route' => ['question.update', $id], 'method' => 'PUT']) !!}
      {!! Form::hidden('tag_category_id', $request['tag_category_id']) !!}
      {!! Form::hidden('title', $request['title']) !!}
      {!! Form::hidden('content', $request['content']) !!}
      {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

