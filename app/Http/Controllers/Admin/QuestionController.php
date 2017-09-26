<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\BaseControllers;

use App\Category;
use App\SubCategory;
use App\Test;
use App\Question;
use Validator;
use App\Http\Requests\StoreQuestion;
use Illuminate\Http\Request;

class QuestionController extends BaseControllers {

	/**
	 * Display a crieteria for questions.
	 *
	 * @return Response
	 */

	public function index()
	{
		$categories = Category::all(['id', 'name']);
		$tests = Test::all(['id', 'name']);
		return view('admin.questions.index', compact('categories', 'sub_categories', 'tests'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getQuestionLists(Request $request)
	{
		$questions = Question::orderBy('id', 'desc')->where('category_id', $request->input('category_id'))->where('sub_category_id', $request->input('sub_category_id'))->where('test_id', $request->input('test_id'))->paginate(10);
		return view('admin.questions.lists', compact('questions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all(['id', 'name']);
		$tests = Test::all(['id', 'name']);
		return view('admin.questions.create', compact('categories', 'sub_categories', 'tests'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreQuestion $request)
	{
		$questionDetails = new Question();
		$questionDetails->category_id 	= $request->input("category_id");
		$questionDetails->sub_category_id = $request->input("sub_category_id");
		$questionDetails->test_id 	= $request->input("test_id");
		$questionDetails->question 	= $request->input("question");
		if ($request->hasFile('image')) {
			$questionDetails->image 	= $this->fileUpload($request->only('image'), 'image');
		}
		$questionDetails->answer1 	= $request->input("answer1");
		$questionDetails->answer2 	= $request->input("answer2");
		$questionDetails->answer3 	= $request->input("answer3");
		$questionDetails->answer4 	= $request->input("answer4");
		$questionDetails->correct_answer = $request->input("correct_answer");
		$questionDetails->description = $request->input("description");
		$questionDetails->save();
		return redirect()->route('admin.questions.create')->with('message', 'Item created successfully.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$question = Question::findOrFail($id);

		return view('admin.questions.edit', compact('question'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(StoreQuestion $request, $id)
	{
		$question = Question::findOrFail($id);

		$question->name = $request->input("name");

		$question->save();

		return redirect()->route('admin.questions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$question = Question::findOrFail($id);
		$question->delete();

		return back()->with('success', 'Item deleted successfully.');
	}

	public function getSubCategory(Request $request)
	{
		$id = $request->input('category_id');
		$subCategories = SubCategory::all(['id', 'name', 'category_id'])->where('category_id',$id);
		foreach($subCategories as $subCategory){
			$data[$subCategory->id] = $subCategory->name;
		}
		return response()->json($data);
	}

	public function importExcel(Request $request)
	{
        $validator = Validator::make($request->all(), [
            'import_file' => 'required|mimes:xlsx'
        ]);
        
        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());
		if ($request->hasFile('import_file')) {
			$path = $request->file('import_file')->getRealPath();
			$rows = \Excel::load($path, function($reader) {
            })->toArray();
			foreach($rows as $row){
                if(!is_null($row['question'])){
                    \DB::transaction(function() use ($row) {
						
						$questionDetails = new Question();
                        $questionDetails->category_id 	= $row['categoryid'];
						$questionDetails->sub_category_id = $row['subcategoryid'];
						$questionDetails->test_id 	= $row['testid'];
						$questionDetails->question 	= $row['question'];
						
						$questionDetails->answer1 	= $row['answer1'];
						$questionDetails->answer2 	= $row['answer2'];
						$questionDetails->answer3 	= $row['answer3'];
						$questionDetails->answer4 	= $row['answer4'];
						$questionDetails->correct_answer = $row['correctanswer'];
						$questionDetails->description = $row['description'];
                        $questionDetails->save();
                    });
                }

            }
		}
		return back()->with('success', 'Question Imported Sussesfully');
    }

}
