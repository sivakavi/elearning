@extends('admin.layouts.admin')

@section('content')
<div class="page-header">
        <h1>Tests / Show #{{$test->id}}</h1>
        <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.tests.edit', $test->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$test->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$test->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.tests.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection