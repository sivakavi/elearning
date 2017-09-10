<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\College;
use Illuminate\Http\Request;

class CollegeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$colleges = College::orderBy('id', 'asc')->paginate(10);

		return view('colleges.index', compact('colleges'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('colleges.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$college = new College();

		$college->name = $request->input("name");
        $college->address = $request->input("address");
        $college->phno = $request->input("phno");
        $college->contact_person = $request->input("contact_person");
        $college->contact_person_phno = $request->input("contact_person_phno");
        $college->website = $request->input("website");

		$college->save();

		return redirect()->route('colleges.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$college = College::findOrFail($id);

		return view('colleges.show', compact('college'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$college = College::findOrFail($id);

		return view('colleges.edit', compact('college'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$college = College::findOrFail($id);

		$college->name = $request->input("name");
        $college->address = $request->input("address");
        $college->phno = $request->input("phno");
        $college->contact_person = $request->input("contact_person");
        $college->contact_person_phno = $request->input("contact_person_phno");
        $college->website = $request->input("website");

		$college->save();

		return redirect()->route('colleges.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$college = College::findOrFail($id);
		$college->delete();

		return redirect()->route('colleges.index')->with('message', 'Item deleted successfully.');
	}

}
