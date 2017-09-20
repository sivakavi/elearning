@extends('admin.layouts.admin')

@section('content')
    <div class="page-header clearfix">
        <h1>
            Tests
            <a class="btn btn-success pull-right" href="{{ route('admin.tests.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($tests->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tests as $test)
                            <tr>
                                <td>{{$test->id}}</td>
                                <td>{{$test->name}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tests.show', $test->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.tests.edit', $test->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tests->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection