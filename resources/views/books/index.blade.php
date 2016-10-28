@extends('layout')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">

                    @include('includes.success-messages')
                    @include('includes.error-messages')

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ trans('books.header_id') }}</th>
                                <th>{{ trans('books.header_name') }}</th>
                                <th>{{ trans('books.header_author') }}</th>
                                <th style="width: 126px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                                <tr>
                                    <td>{{ $book->getId() }}</td>
                                    <td>{{ $book->getName() }}</td>
                                    <td>{{ $book->getAuthor() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">
                                                {{ trans('buttons.actions') }}
                                            </button>
                                            <button type="button" 
                                                class="btn btn-info dropdown-toggle" 
                                                data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('book.edit', $book->getId()) }}">
                                                        {{ trans('buttons.edit') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('book.show', $book->getId()) }}">
                                                        {{ trans('buttons.show') }}
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <form method="POST" action="{{ route('book.destroy', $book->getId()) }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-times-circle"></i> {{ trans('buttons.delete') }}
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">{{ trans('books.no_results') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <!--<div class="box-tools pull-right">
                        {{--!! $books->render() !!--}}
                    </div>-->
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection