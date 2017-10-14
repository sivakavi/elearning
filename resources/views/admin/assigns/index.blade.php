@extends('admin.layouts.admin')
@section('content')
    <div class="page-header">
        <h1>Assigns</h1>
    </div>
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form name="assign-list" action="{{ route('admin.assigns.store') }}" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="college_id">College</label>
                    <select id = 
                    "college_id" class="form-control" name="college_id" required>
                        <option value="">Select any one College...</option>
                        @foreach($colleges as $college)
                            <option value="{{$college->id}}">{{$college->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="group_id">Group</label>
                    <select id = "group_id" class="form-control" name="group_id" required>
                        <option value="">Select any one Group...</option>
                    </select>
                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                    <label>Selected List</label>
                    <ul id="assignCategories" class="sortClass"></ul>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                    <label>Sub-Category List</label>
                        <ul id="subCategories" class="sortClass">
                            @foreach($subCategories as $subCategory)
                                <li id="{{ $subCategory->id }}">{{ $subCategory->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-1"></div>
                    </div>  
                </div>
                <br/>
                <br/>
                
                <center><button type="submit" id="update" class="btn btn-success" style="width:200px;">Update</button></center>
            
            </form>

            <br/>
                <br/>

        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#subCategories").sortable({
                connectWith: "#assignCategories",

                helper: function (e, li) {
                    this.copyHelper = li.clone().insertAfter(li);

                    $(this).data('copied', false);

                    return li.clone();
                },
                stop: function () {

                    var copied = $(this).data('copied');

                    if (!copied) {
                        this.copyHelper.remove();
                    }

                    this.copyHelper = null;
                },
                
                receive: function(e, ui){
                    $(ui.item[0]).remove();
                }
            });

            $("#assignCategories").sortable({
                connectWith: "#subCategories",
                receive: function (e, ui) {
                    ui.sender.data('copied', true);
                }
            });
                    
            $("#assignCategories").on("click", "li", function () {
                
            
            });   
        });
    </script>
    <script>
        $( document ).ready(function() {
            $( "#college_id" ).change(function() {
                var ajaxUrl = "{{ route('admin.assigns.getGroup') }}";
                var $select = $('#group_id');
                $select.find('option').remove();
                if($(this).val()!=""){
                    $.ajax({
                        url: ajaxUrl,
                        type: 'GET',
                        data: {
                            college_id: $(this).val()
                        },
                        success:function(response) {
                            var $select = $('#group_id');
                            $select.find('option').remove();
                            $select.append('<option value=' + '' + '>' + 'Select any one Group...' + '</option>');
                            $.each(response,function(key, value) 
                            {
                                $select.append('<option value=' + key + '>' + value + '</option>');
                            });
                        }
                    });
                }
            });
            $( "#group_id" ).change(function() {
                var ajaxUrl = "{{ route('admin.assigns.getGroupSubCategoryList') }}";
                var $ul = $('#assignCategories');
                $ul.find('li').remove();
                if($(this).val()!=""){
                    $.ajax({
                        url: ajaxUrl,
                        type: 'GET',
                        data: {
                            group_id: $(this).val()
                        },
                        success:function(response) {
                            var $ul = $('#assignCategories');
                            $ul.find('li').remove();
                            $.each(response,function(key, value) 
                            {
                                $ul.append($("<li id="+key+">").text(value));
                            });
                        }
                    });
                }
            });
            $( "#update" ).click(function(e) {
                e.preventDefault();
                var assignSubCategories = [];
                $('ul#assignCategories li').each(function () {
                    assignSubCategories.push($(this).attr("id"));
                });
                if(assignSubCategories.length === 0 || $('#group_id').val() == ""){
                    alert("Please fill all fields");
                }
                else{
                    var ajaxUrl = "{{ route('admin.assigns.store') }}";
                    $.ajax({
                        url: ajaxUrl,
                        type: 'POST',
                        data: {
                            "_token": $('#token').val(),
                            group_id: $('#group_id').val(),
                            assignSubCategories: $.unique(assignSubCategories)
                        },
                        success:function(response) {
                            location.reload();
                        }
                    })
                }
            });
            
        });
    </script>
@endsection