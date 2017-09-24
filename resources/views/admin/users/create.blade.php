@extends('admin.layouts.admin')

@section('content')
    <div class="page-header">
        <h1>Users / Create </h1>
        <a href="{{ asset('assets/user.xlsx') }}">Sample User Excel</a>
         @if(app('request')->input('role')=="student")
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('admin.users.importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="file" name="import_file" />
                @if($errors->has("import_file"))
                    <span class="help-block">{{ $errors->first("import_file") }}</span>
                @endif
                <button class="btn btn-primary">Import File</button>
            </form>
        @endif
    </div>
    @include('error')
    <form class="form-horizontal" method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h4>Contact Information</h4><br>
        <div class="form-group">
            <label class="control-label col-sm-3" for="fname">First Name:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="lname">Last Name:</label>
            <div class="col-sm-6"> 
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="dob">DOB:</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" id="dob" name="dob" placeholder="DOB" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="cemail">Personal Email:</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="cemail" id="cemail" placeholder="Enter email" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="phno">Phone No:</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="phno" id="phno" placeholder="Phone No" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="address">Address:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" id="address" placeholder="Address">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="emergency_person">Emergency Contact Person:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="emergency_person" id="emergency_person" placeholder="Emergency Contact Person" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="emergency_contact_no">Emergency Contact Number:</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="emergency_contact_no" id="emergency_contact_no" placeholder="Emergency Contact Number" required>
            </div>
        </div>

        <br><h4>User Information</h4><br>

        <div class="form-group">
            <label class="control-label col-sm-3" for="email">Official Email:</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Official Email" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="password">Password:</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
        </div>

        <div class="form-group hide">
            <label class="control-label col-sm-3" for="manager">Role:</label>
            <div class="col-sm-6">
                <input id="staff" type="radio" name="role" value="staff" @if(app('request')->input('role')=="staff") checked @endif> <label for="staff">Staff</label>
                <input id="student" type="radio" name="role" value="student"  @if(app('request')->input('role')=="student") checked @endif> <label for="student">Student</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="confirmed   ">Active:</label>
            <div class="col-sm-6">
                <input id="active" type="radio" name="active" value="1" required> <label for="active">Yes</label>
                <input id="inactive" type="radio" name="active" value="0"> <label for="inactive">No</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="confirmed   ">Confirmed:</label>
            <div class="col-sm-6">
                <input id="yes" type="radio" name="confirmed" value="1" required> <label for="yes">Yes</label>
                <input id="no" type="radio" name="confirmed" value="0"> <label for="no">No</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="confirmed   ">College:</label>
            <div class="col-sm-6">
                <select class="form-control" name="college_id" id="college_id" required>
                    <option value="">Select any one college...</option>
                    @foreach($colleges as $college)
                        <option value="{{$college->id}}">{{$college->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group @if(app('request')->input('role')=='staff') hide @endif">
            <label class="control-label col-sm-3" for="group_id">Group:</label>
            <div class="col-sm-6">
                <select id = "group_id" class="form-control" name="group_id" @if(app('request')->input('role')=="student") required @endif>
                    <option value="">Select any one Group...</option>
                </select>
            </div>
        </div>

        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    @parent
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
        });
    </script>
@endsection