@extends('admin.layouts.admin')

@section('content')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> SubCategories / Edit #{{$sub_category->id}}</h1>
        
    </div>
    @include('error')
    <br/>
    <a class="btn btn-success pull-right" href="{{ route('admin.sub_categories_file.index',['sub_category_id' => $sub_category->id]) }}"><i class="glyphicon glyphicon-plus"></i> File Upload</a>
<br/>
    <div class="row">
        <div class="col-md-6 center-margin">

            <form action="{{ route('admin.sub_categories.update', $sub_category->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $sub_category->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('category_id')) has-error @endif">
                       <label for="category_id-field">Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select any one Category...</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $sub_category->category()->first()->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                       @if($errors->has("category_id"))
                        <span class="help-block">{{ $errors->first("category_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.sub_categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
