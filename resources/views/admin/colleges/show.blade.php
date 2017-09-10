@extends('admin.layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$college->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$college->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="phno">PHNO</label>
                     <p class="form-control-static">{{$college->phno}}</p>
                </div>
                    <div class="form-group">
                     <label for="contact_person">CONTACT_PERSON</label>
                     <p class="form-control-static">{{$college->contact_person}}</p>
                </div>
                    <div class="form-group">
                     <label for="contact_person_phno">CONTACT_PERSON_PHNO</label>
                     <p class="form-control-static">{{$college->contact_person_phno}}</p>
                </div>
                    <div class="form-group">
                     <label for="website">WEBSITE</label>
                     <p class="form-control-static">{{$college->website}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('admin.colleges.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection