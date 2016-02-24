@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{!! @trans('admin/category.page_title') !!} - {!! @trans('admin/category.create') !!}</h2>
                <br>
                <ul class="nav nav-tabs">
                    @foreach($languages as $key => $lang)
                        <li {{ $lang->code == 'ro' ? ' class="active"' : '' }}><a data-toggle="tab" href="#{{ $lang->name }}">{{ $lang->name }}</a></li>
                    @endforeach
                </ul>

                <div class="panel-body">
                    {!! Form::open(array('route' => 'admin.category.store', 'class' => 'form-horizontal',  'role' => "form")) !!}
                    {!! Form::token() !!}
                    @if ($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="tab-content">
                        @foreach($languages as $key => $lang)
                            <div id="{{ $lang->name }}" class="tab-pane fade">
                                <div class="form-group">
                                    {!! Form::label('trans['. $lang->code.'][name]', @trans('admin/variables/legals.name'), array('class' => 'control-label col-sm-2')) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('trans['. $lang->code.'][name]', old('name'), array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('trans['. $lang->code.'][description]', @trans('admin/variables/legals.description'), array('class' => 'control-label col-sm-2')) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('trans['. $lang->code.'][description]', old('description'), array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit(@trans('admin/variables/legals.create'), array('class' => 'btn btn-default')) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection