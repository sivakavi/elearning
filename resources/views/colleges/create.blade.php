@extends('admin.layouts.admin')

@section('content')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Colleges / Create </h1>
    </div>
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('colleges.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <textarea class="form-control" id="address-field" rows="3" name="address">{{ old("address") }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phno')) has-error @endif">
                       <label for="phno-field">Phno</label>
                    <input type="text" id="phno-field" name="phno" class="form-control" value="{{ old("phno") }}"/>
                       @if($errors->has("phno"))
                        <span class="help-block">{{ $errors->first("phno") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('contact_person')) has-error @endif">
                       <label for="contact_person-field">Contact_person</label>
                    <input type="text" id="contact_person-field" name="contact_person" class="form-control" value="{{ old("contact_person") }}"/>
                       @if($errors->has("contact_person"))
                        <span class="help-block">{{ $errors->first("contact_person") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('contact_person_phno')) has-error @endif">
                       <label for="contact_person_phno-field">Contact_person_phno</label>
                    <input type="text" id="contact_person_phno-field" name="contact_person_phno" class="form-control" value="{{ old("contact_person_phno") }}"/>
                       @if($errors->has("contact_person_phno"))
                        <span class="help-block">{{ $errors->first("contact_person_phno") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('website')) has-error @endif">
                       <label for="website-field">Website</label>
                    <input type="text" id="website-field" name="website" class="form-control" value="{{ old("website") }}"/>
                       @if($errors->has("website"))
                        <span class="help-block">{{ $errors->first("website") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('colleges.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
