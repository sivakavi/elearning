@extends('admin.layouts.admin')

@section('content')
    <div class="page-header clearfix">
        <h1>
            Colleges
            <a class="btn btn-success pull-right" href="{{ route('admin.colleges.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($colleges->count())
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>ADDRESS</th>
                        <th>PHNO</th>
                        <th>CONTACT_PERSON</th>
                        <th>CONTACT_PERSON_PHNO</th>
                        <th>WEBSITE</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($colleges as $college)
                            <tr>
                                <td>{{$college->id}}</td>
                                <td>{{$college->name}}</td>
                                <td>{{$college->address}}</td>
                                <td>{{$college->phno}}</td>
                                <td>{{$college->contact_person}}</td>
                                <td>{{$college->contact_person_phno}}</td>
                                <td>{{$college->website}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.colleges.show', $college->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.colleges.edit', $college->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('admin.colleges.destroy', $college->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $colleges->links() }}
                </div>
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection