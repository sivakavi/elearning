@extends('admin.layouts.admin')
@section('content')
    <div class="page-header">
        <h1>SubCategories File  / Create </h1>
    </div>
    @include('error')

    <div class="row">
        <div class="col-md-6 center-margin">

            <form action="{{ route('admin.sub_categories_file.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="sub_category_id" value="{{ $_GET['sub_category_id'] }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                    <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                    @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('file')) has-error @endif">
                    <label class="control-label col-sm-3" for="file">File:</label>
                    <input type="file" class="form-control" name="file" id="file" required>
                    @if($errors->has("file"))
                        <span class="help-block">{{ $errors->first("file") }}</span>
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