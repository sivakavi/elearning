@extends('staff.layouts.staff')

@section('title', __('views.admin.dashboard.title'))

@section('content')

<style>
.tile-stats
{
    border: 1px solid #2a3f54;
}
#box1
{
    border: 1px solid #2a3f54;

}


</style>

    <div class="page-header clearfix"></div>

    

    <div class="row top_tiles margin-top-40">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-institution"></i></div>
                    <div class="count">{{ $userCount }}</div>
                    <h3>Total number of Users</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cubes"></i></div>
                    <div class="count">{{ $groupCount }}</div>
                    <h3>Total number of Groups</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a target="_blank" href="{{ route('staff.studentLists')}}?active=true">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cubes"></i></div>
                    <div class="count">{{ $activeUserCount }}</div>
                    <h3>Total number of active Users</h3>
                    </div></a>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a target="_blank" href="{{ route('staff.studentLists')}}?inactive=true">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cubes"></i></div>
                    <div class="count">{{ $userCount-$activeUserCount }}</div>
                    <h3>Total number of inactive Users</h3>
                    </div></a>
                </div>
                <div class="form-group">
                    <label for="group_id">Group</label>
                    <select id = 
                    "group_id" class="form-control" name="group_id" required>
                        <option value="">Select Any Group</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
    </div>  

    <div class="row margin-top-50">

@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
    <script>
        $(function(){
            $('#group_id').change(function(e){
                e.preventDefault();
                if($(this).val()){
                    var url = "{{ route('staff.studentLists')}}";
                    window.open(
                    url+"?group_id="+$(this).val(),
                    '_blank' // <- This is what makes it open in a new window.
                    );
                }
            })
        })
    </script>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection