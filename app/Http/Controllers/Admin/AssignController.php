<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SubCategory;
use App\College;
use App\Group;
use Illuminate\Http\Request;

class AssignController extends Controller 
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$colleges = College::all(['id', 'name']);
		$subCategories = SubCategory::all(['id', 'name']);

		return view('admin.assigns.index', compact('colleges','subCategories'));
    }

    public function store(Request $request)
	{
        $groupId = $request->input('group_id');
        $assignSubCategories = $request->input('assignSubCategories');
        $group = Group::find($groupId);
        $group->sub_categories()->sync($assignSubCategories);
        return 'true';
    }

    public function getGroup(Request $request)
	{
		$id = $request->input('college_id');
		$groups = Group::all(['id', 'name', 'college_id'])->where('college_id',$id);
		foreach($groups as $group){
			$data[$group->id] = $group->name;
		}
		return response()->json($data);
    }
    
    

    public function getGroupSubCategoryList(Request $request)
	{
        $id = $request->input('group_id');
        $sub_categories = Group::find($id)->sub_categories()->get();
        
        $data = array();
        foreach ($sub_categories as $sub_category) {
            $data[$sub_category->id] = $sub_category->name;
        }
		return response()->json($data);
    }
}