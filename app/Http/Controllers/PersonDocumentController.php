<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PersonDocument;
use Illuminate\Http\Request;

class PersonDocumentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$person_documents = PersonDocument::orderBy('id', 'desc')->paginate(10);

		return view('person_documents.index', compact('person_documents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('person_documents.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$person_document = new PersonDocument();

		$person_document->document = $request->input("document");

		$person_document->save();

		return redirect()->route('person_documents.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$person_document = PersonDocument::findOrFail($id);

		return view('person_documents.show', compact('person_document'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$person_document = PersonDocument::findOrFail($id);

		return view('person_documents.edit', compact('person_document'));
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
		$person_document = PersonDocument::findOrFail($id);

		$person_document->document = $request->input("document");

		$person_document->save();

		return redirect()->route('person_documents.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$person_document = PersonDocument::findOrFail($id);
		$person_document->delete();

		return redirect()->route('person_documents.index')->with('message', 'Item deleted successfully.');
	}

}
