@extends('admin.layouts.admin')

@section('content')
    <div class="page-header">
        <h1>Users / Create </h1>
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

        <br><h4>Photo Upload</h4><br>

        <div class="form-group">
            <label class="control-label col-sm-3" for="photo">Photo:</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" name="photo" id="photo" required>
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

        <div class="form-group">
            <label class="control-label col-sm-3" for="manager">Role:</label>
            <div class="col-sm-6">
                <input id="staff" type="radio" name="role" value="staff" required> <label for="staff">Staff</label>
                <input id="student" type="radio" name="role" value="student"> <label for="student">Student</label>
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
                <select class="form-control" name="college_id" required>
                    <option value="">Select any one college...</option>
                    @foreach($colleges as $college)
                        <option value="{{$college->id}}">{{$college->name}}</option>
                    @endforeach
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