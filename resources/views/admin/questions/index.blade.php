@extends('admin.layouts.admin')
@section('content')
    <div class="page-header">
        <h1>Questions / Lists 
        <a class="btn btn-success pull-right" href="{{ route('admin.questions.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a></h1>
    </div>
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form name="question-list">
                
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select id = 
                    "category_id" class="form-control" name="category_id" required>
                        <option value="">Select any one Category...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sub_category_id">Sub_Category</label>
                    <select id = "sub_category_id" class="form-control" name="sub_category_id" required>
                        <option value="">Select any one Sub Category...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="test_id">Test</label>
                    <select id = 
                    "test_id" class="form-control" name="test_id" required>
                        <option value="">Select any one Test...</option>
                        @foreach($tests as $test)
                            <option value="{{$test->id}}">{{$test->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="well well-sm">
                    <button type="submit" id="getlist" class="btn btn-primary">Get List</button>
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
            $( "#getlist" ).click(function(e) {
                e.preventDefault();
                if($("#category_id").val()=="" || $("#sub_category_id").val()=="" || $("#test_id").val()==""){
                    alert("Please fill all the fields");
                }
                else{
                    var queryString = "?category_id="+$("#category_id").val()+"&sub_category_id="+$("#sub_category_id").val()+"&test_id="+$("#test_id").val()
                    window.location = "{{ route('admin.questions.getQuestionLists') }}"+queryString;
                }
            });
        });
    </script>
@endsection