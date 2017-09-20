<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\BaseControllers;

use App\Test;
use App\Http\Requests\StoreTest;

class TestController extends BaseControllers {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tests = Test::orderBy('id', 'desc')->paginate(10);

		return view('admin.tests.index', compact('tests'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tests.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreTest $request)
	{
		$test = new Test();

		$test->name = $request->input("name");

		$test->save();

		return redirect()->route('admin.tests.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$test = Test::findOrFail($id);

		return view('admin.tests.show', compact('test'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$test = Test::findOrFail($id);

		return view('admin.tests.edit', compact('test'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(StoreTest $request, $id)
	{
		$test = Test::findOrFail($id);

		$test->name = $request->input("name");

		$test->save();

		return redirect()->route('admin.tests.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$test = Test::findOrFail($id);
		$test->delete();

		return redirect()->route('admin.tests.index')->with('message', 'Item deleted successfully.');
	}

}
