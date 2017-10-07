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
        return view('staff.dashboard', compact('userCount','groupCount', 'activeUserCount'));
    }

    public function studentList(Request $request)
    {
        $id = $request->input('group_id');
        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');})->where('college_id', $this->college->id);
        $students = $students->paginate();
        return view('staff.list', ['users' => $students]);
        
    }
   
}