@extends('layout')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <!-- form start -->
                <form role="form" class="form-horizontal" action="{{ route('book.store') }}" method="POST">
                    <div class="box-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">
                            	{{ trans('books.label_name') }}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" 
                                	class="form-control" 
                                	name="name"
                                    placeholder="{{ trans('books.label_name') }}" 
                                    value="{{ old('name') }}">
                                {!! $errors->first('name', '<span class="help-block">* :message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
                            <label class="col-sm-2 control-label">
                            	{{ trans('books.label_author') }}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" 
                                	class="form-control" 
                                	name="author"
                                	placeholder="{{ trans('books.label_author') }}" 
                                	value="{{ old('author') }}">
                                {!! $errors->first('author', '<span class="help-block">* :message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info btn-block">
                        	{{ trans('buttons.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection