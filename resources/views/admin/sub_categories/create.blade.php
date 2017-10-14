@extends('admin.layouts.admin')
@section('content')
    <div class="page-header">
        <h1>SubCategories / Create </h1>
    </div>
    @include('error')

    <div class="row">
        <div class="col-md-6 center-margin">

            <form action="{{ route('admin.sub_categories.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>
                
                <div class="form-group @if($errors->has('category_id')) has-error @endif">
                    <label for="category_id-field">Category_id</label>
                    <select class="form-control" name="category_id">
                        <option value="">Select any one Category...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("category_id"))
                    <span class="help-block">{{ $errors->first("category_id") }}</span>
                    @endif
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.sub_categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection