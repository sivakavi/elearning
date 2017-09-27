<?php

namespace App\Http\Controllers\Student;

use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Group;
use App\Category;
use Auth;

class DashboardController extends Controller
{

    private $user;
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
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = $this->user->group->sub_categories()->get();
        foreach ($sub_categories as $sub_category) {
            $categories[$sub_category->category_id] = $sub_category->parent_name;
        }
        return view('student.dashboard', compact('categories'));
    }

    public function category($id)
    {
        $subCategories = $this->getSubCategory($id);
        return view('student.subcategorylist', compact('subCategories'));  
    }

    public function subCategories()
    {
        $subCategories = $this->getSubCategory();
        return view('student.subcategorylist', compact('subCategories'));
    }

    public function subCategory($id)
    {
        $subCategory = $this->user->group->sub_categories()->where('id',$id)->first();
        if(!is_null($subCategory)){
            $subCategory = $subCategory->toArray();
            return view('student.subcategorylist', compact('subCategory'));
        }
        abort(404, 'Yor are not authorized to page access');
    }

    private function getSubCategory($category= null)
    {
        $subCategories =array();
        if($category){
            $sub_categories = $this->user->group->sub_categories()->select('category_id')->get()->toArray();
            $userCategories = array_column($sub_categories, 'category_id');
            if(in_array($category, $userCategories)){
                $subCategories =  $this->user->group->sub_categories()->where('category_id',$category)->get()->toArray();
                return $this->transformSubCategory($subCategories);
            }
            abort(404, 'Yor are not authorized to page access');
        }
        $subCategories = $this->user->group->sub_categories()->get()->toArray();
        return $this->transformSubCategory($subCategories);
    }

    private function transformSubCategory($subCategories=array())
    {
        $subCategory = array();
        foreach ($subCategories as $key => $value) {
            $subCategory[$value['id']] = $value['name'];
        }
        return $subCategory;
    }
}
