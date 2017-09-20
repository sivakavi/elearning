@extends('admin.layouts.admin')
@section('content')
    <div class="page-header">
        <h1>Questions / Create </h1>
    </div>
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="form-group @if($errors->has('category_id')) has-error @endif">
                    <label for="category_id">Category</label>
                    <select id = 
                    "category_id" class="form-control" name="category_id">
                        <option value="">Select any one Category...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("category_id"))
                    <span class="help-block">{{ $errors->first("category_id") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('sub_category_id')) has-error @endif">
                    <label for="sub_category_id">Sub_Category</label>
                    <select id = "sub_category_id" class="form-control" name="sub_category_id" required>
                        <option value="">Select any one Sub Category...</option>
                    </select>
                    @if($errors->has("sub_category_id"))
                    <span class="help-block">{{ $errors->first("sub_category_id") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('test_id')) has-error @endif">
                    <label for="test_id">Test</label>
                    <select id = 
                    "test_id" class="form-control" name="test_id">
                        <option value="">Select any one Test...</option>
                        @foreach($tests as $test)
                            <option value="{{$test->id}}">{{$test->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has("test_id"))
                    <span class="help-block">{{ $errors->first("test_id") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('question')) has-error @endif">
                    <label for="question">Question</label>
                    <textarea id="question" name="question" class="form-control"></textarea>
                    @if($errors->has("question"))
                        <span class="help-block">{{ $errors->first("question") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('image')) has-error @endif">
                    <label class="control-label col-sm-3" for="image">Image:</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @if($errors->has("image"))
                        <span class="help-block">{{ $errors->first("image") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('answer1')) has-error @endif">
                    <label for="answer1">Answer 1</label>
                    <input type="text" id="answer1" name="answer1" class="form-control" value="{{ old("answer1") }}"/>
                    @if($errors->has("answer1"))
                        <span class="help-block">{{ $errors->first("answer1") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('answer2')) has-error @endif">
                    <label for="answer2">Answer 2</label>
                    <input type="text" id="answer2" name="answer2" class="form-control" value="{{ old("answer2") }}"/>
                    @if($errors->has("answer2"))
                        <span class="help-block">{{ $errors->first("answer2") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('answer3')) has-error @endif">
                    <label for="answer3">Answer 3</label>
                    <input type="text" id="answer3" name="answer3" class="form-control" value="{{ old("answer3") }}"/>
                    @if($errors->has("answer3"))
                        <span class="help-block">{{ $errors->first("answer3") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('answer4')) has-error @endif">
                    <label for="answer4">Answer 4</label>
                    <input type="text" id="answer4" name="answer4" class="form-control" value="{{ old("answer4") }}"/>
                    @if($errors->has("answer4"))
                        <span class="help-block">{{ $errors->first("answer4") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('correct_answer')) has-error @endif">
                    <label for="correct_answer">Correct Answer</label>
                    <select id = 
                    "correct_answer" class="form-control" name="correct_answer">
                        <option value="1">Answer 1</option>
                        <option value="2">Answer 2</option>
                        <option value="3">Answer 3</option>
                        <option value="4">Answer 4</option>
                    </select>
                    @if($errors->has("correct_answer"))
                    <span class="help-block">{{ $errors->first("correct_answer") }}</span>
                    @endif
                </div>

                <div class="form-group @if($errors->has('description')) has-error @endif">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                    @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                    @endif
                </div>
                
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('admin.questions.create') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $( document ).ready(function() {
            $( "#category_id" ).change(function() {
                var ajaxUrl = "{{ route('admin.getSubCategory') }}";
                $.ajax({
                    url: ajaxUrl,
                    type: 'GET',
                    data: {
                        category_id: $(this).val()
                    },
                    success:function(response) {
                        var $select = $('#sub_category_id');
                        $select.find('option').remove();
                        $select.append('<option value=' + '' + '>' + 'Select any one Sub Category...' + '</option>');
                        $.each(response,function(key, value) 
                        {
                            $select.append('<option value=' + key + '>' + value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection