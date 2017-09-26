@extends('admin.layouts.admin')

@section('title', __('views.admin.college.create.title'))

@section('content')

   <div class="page-header clearfix"></div>

    @include('error')

    <div class="row margin-top-30">
        <div class="col-md-8 center-margin">
            <form class="form-horizontal form-label-left" action="{{ route('admin.colleges.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>College Create Form</h2>
                                    <ul class="nav navbar-right">
                                    <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content margin-top-40">
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
                                    <input type="number" id="phno-field" name="phno" maxlength="10" class="form-control" value="{{ old("phno") }}"/>
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
                                    <input type="number" id="contact_person_phno-field" maxlength="10" name="contact_person_phno" class="form-control" value="{{ old("contact_person_phno") }}"/>
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

                                    <div class="well well-sm margin-top-50">
                                        <button type="submit" class="btn btn-primary btn-round btn-sm">Create College</button>
                                        <a class="btn btn-link pull-right" href="{{ route('admin.colleges.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
            </form>
        </div>
    </div>
    
@endsection
