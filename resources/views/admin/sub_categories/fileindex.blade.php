@extends('admin.layouts.admin')

@section('content')
    <div class="page-header clearfix">
        <h1>
             SubCategories File
            <a class="btn btn-success pull-right" href="{{ route('admin.sub_categories_file.create',['sub_category_id' => $_GET['sub_category_id']]) }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($sub_categories_file->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>FILE</th>
                            <th>SUBCATEGORY</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sub_categories_file as $sub_category_file)
                            <tr>
                            <td><a target="_blank" href="{{ asset('uploads')}}/{{ $sub_category_file->file }}">{{$sub_category_file->file}}</a></td>
                            <td>{{$sub_category_file->parentName}}</td>
                            <td class="text-right">
                                <form action="{{ route('admin.sub_categories_file.destroy', $sub_category_file->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $sub_categories_file->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection