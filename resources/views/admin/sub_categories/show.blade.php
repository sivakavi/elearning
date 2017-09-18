@extends('admin.layouts.admin')
@section('content')
    <h1>SubCategories / Show #{{$sub_category->id}}</h1>
    <form action="{{ route('admin.sub_categories.destroy', $sub_category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.sub_categories.edit', $sub_category->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <form action="#">
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$sub_category->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="file">FILE</label>
                     <p class="form-control-static">{{$sub_category->file}}</p>
                </div>
                    <div class="form-group">
                     <label for="category_id">CATEGORY</label>
                     <p class="form-control-static">{{$sub_category->category()->first()->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.sub_categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>
@endsection