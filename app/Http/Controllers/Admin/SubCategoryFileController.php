<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\BaseControllers;

use App\SubCategoryFile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubCategoryFile;


class SubCategoryFileController extends BaseControllers {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$sub_category_id = $request->input("sub_category_id");
		
		$sub_categories_file = SubCategoryFile::orderBy('id', 'desc')->where('sub_category_id', $sub_category_id)->paginate(10);
		// dd($sub_categories_file);
		
		return view('admin.sub_categories.fileindex', compact('sub_categories_file'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.sub_categories.filecreate');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreSubCategoryFile $request)
	{
		$sub_category_file = new SubCategoryFile();
		$sub_category_file->file = $this->fileUploadWithName($request->only('file'), 'file', $request->input("name"));
        $sub_category_file->sub_category_id = $request->input("sub_category_id");

		$sub_category_file->save();
		
		return redirect()->route('admin.sub_categories_file.index',['sub_category_id' => $request->input("sub_category_id")])->with('message', 'Item created successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sub_category_file = SubCategoryFile::findOrFail($id);
		$sub_category_id = $sub_category_file->sub_category_id;
		$sub_category_file->delete();

		return redirect()->route('admin.sub_categories_file.index',['sub_category_id' => $sub_category_id])->with('message', 'Item deleted successfully.');
	}

}
