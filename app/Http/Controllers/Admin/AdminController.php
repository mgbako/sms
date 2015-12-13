<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Http\Requests\AdminRequest;
use Scholr\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * guard against unauthorized use
	 */
	public function __construct()
	{
		$this->middleware('staff');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$count = 1;
		$admins = Admin::all();
		return view('admin.staff.index', compact('count', 'admins'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.staff.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminRequest $request)
	{
		$admin = Admin::create($request->all());
		flash('New Admin Staff Whose Firstname is:'.$admin->firstname. ' Was created Successfully');
		return redirect('admins');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$admin = Admin::whereSlug($slug)->first();
		return view('admin.staff.show', compact('admin'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{
		$admin = Admin::whereSlug($slug)->first();
		return view('admin.staff.edit', compact('admin'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug, AdminRequest $request)
	{
		$admin = Admin::whereSlug($slug)->first();
		$amin->update($request->all());
		return redirect('admins');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($slug, Request $request)
	{
		$admin = Admin::whereSlug($slug)->first();
		if($request->get('agree')===1){
			$admin>delete();
			redirect('admins');
		}
		flash('The Requested Record is not in our database');
		redirect('admins');
	}

}
