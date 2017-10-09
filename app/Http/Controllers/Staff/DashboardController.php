<?php

namespace App\Http\Controllers\Staff;

use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Group;
use App\Category;
use Auth;
use App\Question;
use App\ViewReport;

class DashboardController extends Controller
{
    private $user;

    private $college;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->college = $this->user->college;
            return $next($request);
        });
    }

    public function index()
    {
        // $college = $this->college;
        $groupCount = $this->college->groups->count();
        $userCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');})->where('college_id', $this->college->id)->count();
        $activeUserCount = User::whereHas('roles', function ($query) {
                $query->where('name', 'student');})->where('college_id', $this->college->id)->whereNotNull('last_login')->count();
        $college_id = $this->college->id;
        $groups = Group::all(['id', 'name', 'college_id'])->where('college_id',$college_id);
        
        return view('staff.dashboard', compact('userCount','groupCount', 'activeUserCount', 'groups'));
    }

    public function studentList(Request $request)
    {
        $group_id = $request->input('group_id');
        $active = $request->input('active');
        $inactive = $request->input('inactive');
        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');})->where('college_id', $this->college->id);
        if($group_id){
            $students->where('group_id', $group_id);
        }
        if($inactive){
            $students->whereNull('last_login');
        }
        if($active){
            $students->whereNotNull('last_login');
        }
        $students = $students->paginate(1);
        return view('staff.list', ['users' => $students]);
        
    }

    public function student($id)
    {
        
        $student = User::find($id);
        $subCategories = $student->group->sub_categories()->get();
        $totalCount = count($subCategories);
        $viewCount = ViewReport::where("user_id", $student->id)->count();
        $categories = $subCategoriesName = array();
        foreach ($subCategories as $subCategory) {
            $categories[$subCategory->category_id] = $subCategory->parent_name;
            $subCategoriesName[]=$subCategory->name;
        }
        return view('staff.viewStudent', compact('categories', 'subCategoriesName', 'totalCount', 'viewCount', 'student'));
        
    }
   
}