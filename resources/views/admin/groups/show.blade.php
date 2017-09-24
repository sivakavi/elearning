@extends('admin.layouts.admin')
@section('content')
    <h1>Group / Show #{{$group->id}}</h1>
    <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.groups.edit', $group->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <form action="#">
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$group->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="file">EXPIRY</label>
                     <p class="form-control-static">{{ $group->expiry }}</p>
                </div>
                    <div class="form-group">
                     <label for="category_id">COLLEGE</label>
                     <p class="form-control-static">{{$group->college()->first()->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.groups.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
@endsection