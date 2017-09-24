<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\BaseControllers;

use App\College;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroup;


class GroupController extends BaseControllers {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$groups = Group::orderBy('id', 'desc')->paginate(10);
		return view('admin.groups.index', compact('groups'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$colleges = College::all(['id', 'name']);
		return view('admin.groups.create', compact('colleges'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreGroup $request)
	{
		$group = new Group();

		$group->name = $request->input("name");
        $group->expiry = $request->input("expiry");
        $group->college_id = $request->input("college_id");

		$group->save();

		return redirect()->route('admin.groups.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group = Group::findOrFail($id);
		return view('admin.groups.show', compact('group'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$group = Group::findOrFail($id);
		$colleges = College::all(['id', 'name']);
		return view('admin.groups.edit', compact('group', 'colleges'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(StoreGroup $request, $id)
	{
		$group = Group::findOrFail($id);

		$group->name = $request->input("name");
        $group->expiry = $request->input("expiry");
        $group->college_id = $request->input("college_id");

		$group->save();

		return redirect()->route('admin.groups.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$group = Group::findOrFail($id);
		$group->delete();

		return redirect()->route('admin.groups.index')->with('message', 'Item deleted successfully.');
	}

}
