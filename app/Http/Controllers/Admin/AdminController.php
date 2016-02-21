<?php namespace Scholr\Http\Controllers\Admin;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;
use Scholr\Http\Requests\AdminRequest;
use Illuminate\Contracts\Auth\Guard;
use Scholr\Admin;
use Scholr\User;
use Auth;
use DB;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * guard against unauthorized use
	 */
	public function __construct(Guard $auth)
	{
		$this->middleware('admin');
		$this->current_user = $auth->user();
	}

	private $current_user;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if($this->current_user->type !== 'admin')
		{
			return redirect()->back();
		}
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			redirect()->back();
		}
		$count = 1;
		$admins = Admin::all();
		return view('admin.admin.index', compact('count', 'admins'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			redirect()->back();
		}
		return view('admin.admin.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminRequest $request)
	{	
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			return redirect('admin')->back();
		}
		$requests = $request->all();
		if ($request->hasFile('image')) {
				$image = $request->file('image');
				$filename = time()."-".$image->getClientOriginalName();
				$path = public_path('img/admins/'.$filename);
				\Image::make($image->getRealPath())->resize(150, 100)->save($path);
				$requests['image'] = 'img/admins/'.$filename;
				$admin = new Admin($requests);
				$admin->image = 'img/admins/'.$filename;
			}
		$admin->save();
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
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			return redirect('admin')->back();
		}
		$admin = Admin::whereId($slug)->first();
		return view('admin.admin.show', compact('admin'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($slug)
	{	
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			return redirect('admin')->back();
		}
		$admin = Admin::whereId($slug)->first();
		return view('admin.admin.edit', compact('admin'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($slug, AdminRequest $request)
	{	
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			return redirect('admin')->back();
		}
		$admin = Admin::whereId($slug)->first();
		if($this->current_user->type == 'princepal' && $admin->type != 'princepal')
		{
			flash("You are not allowed to make changes to this yours data");
			return redirect('admin')->back();
		}
		$admin->update($request->all());
		flash('Admin data updated');
		return redirect('admins');
	}


	public function delete($id)
	{
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			return redirect('admin')->back();
		}
		$admin = admin::findOrFail($id);

		return view('admin.admin.delete', compact('admin'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($slug, Request $request)
	{	
		if($this->current_user->type == 'secretary')
		{
			flash("You are not allowed to access this area");
			return redirect()->back();
		}
		$admin = Admin::whereId($slug)->first();
		if($admin){
			if($this->current_user->type == 'princepal' && $admin->type != 'princepal')
			{
				flash("You are not allowed to make changes to this yours data");
				return redirect('admin')->back();
			}
			if((int)$request->get('agree')===1){
				$user = User::whereAdmin_id($admin->id)->first();

				$admin->delete();
				if($user)
				{
					$user->delete();
				}
				flash('Admin data deleted, note: The user account of this admin has also be deleted');
				return redirect('admins');
			}
		}else{
			flash('The Requested Record is not in our database');
			return redirect('admins');
		}
		 return redirect('admins');
	}
	 public function missingMethod($parameters = array())
   {
     return redirect('/');
   }
}
