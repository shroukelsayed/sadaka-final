<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CharityDocument;
use Illuminate\Http\Request;

class CharityDocumentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$charity_documents = CharityDocument::orderBy('id', 'desc')->paginate(10);

		return view('charity_documents.index', compact('charity_documents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('charity_documents.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$charity_document = new CharityDocument();

		$charity_document->doc = $request->input("doc");

		$charity_document->save();

		return redirect()->route('charity_documents.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$charity_document = CharityDocument::findOrFail($id);

		return view('charity_documents.show', compact('charity_document'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$charity_document = CharityDocument::findOrFail($id);

		return view('charity_documents.edit', compact('charity_document'));
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
		$charity_document = CharityDocument::findOrFail($id);

		$charity_document->doc = $request->input("doc");

		$charity_document->save();

		return redirect()->route('charity_documents.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$charity_document = CharityDocument::findOrFail($id);
		$charity_document->delete();

		return redirect()->route('charity_documents.index')->with('message', 'Item deleted successfully.');
	}

}
