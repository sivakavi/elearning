<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\BaseControllers;

use App\SubCategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubCategory;


class SubCategoryController extends BaseControllers {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$sub_categories = SubCategory::orderBy('id', 'desc')->paginate(10);
		return view('admin.sub_categories.index', compact('sub_categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all(['id', 'name']);
		return view('admin.sub_categories.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreSubCategory $request)
	{
		$sub_category = new SubCategory();

		$sub_category->name = $request->input("name");
        $sub_category->category_id = $request->input("category_id");

		$sub_category->save();

		return redirect()->route('admin.sub_categories.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$sub_category = SubCategory::findOrFail($id);
		return view('admin.sub_categories.show', compact('sub_category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sub_category = SubCategory::findOrFail($id);
		$categories = Category::all(['id', 'name']);
		return view('admin.sub_categories.edit', compact('sub_category', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(StoreSubCategory $request, $id)
	{
		$sub_category = SubCategory::findOrFail($id);

		$sub_category->name = $request->input("name");
        $sub_category->category_id = $request->input("category_id");

		$sub_category->save();

		return redirect()->route('admin.sub_categories.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sub_category = SubCategory::findOrFail($id);
		$sub_category->delete();

		return redirect()->route('admin.sub_categories.index')->with('message', 'Item deleted successfully.');
	}

}
