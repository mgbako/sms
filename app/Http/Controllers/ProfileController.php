<?php
namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Requests\profileRequest;
use Scholr\Http\Controllers\Controller;
use DB;
use Image;
use Auth;
use File;
use Scholr\Profile;
use Scholr\SubjectAssigned;
use Scholr\Classe;

class ProfileController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {   
        $user = Auth::user();
        if ($user->type == 'teacher') {
            $teacher = DB::table('teachers')->where('staffId', $user->loginId)->first();
            $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
            return view('account.makeProfile', compact('assigned'));
        }
        
        return view('account.makeProfile');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(profileRequest $request)
    {
        $user = Auth::user();
        $requests = $request->all();
        $image = $request->file('image');
        $filename = time()."-".$image->getClientOriginalName();
        $path = public_path('img/users/'.$filename);
        Image::make($image->getRealPath())->resize(150, 100)->save($path);
        $requests['image'] = 'img/users/'.$filename;
        $profile = new Profile($requests);
        $profile->image = 'img/users/'.$filename;
        $user->profile()->save($profile);
        $slug = $user->slug;
        flash('Your Profile was created successfully!');
        if ($user->type == 'student') {
            return redirect('account/student/'.$slug);
        }
        elseif ($user->type == 'profile') {
            return redirect('account/profile/'.$slug);
        }
        elseif ($user->type == 'admin') {
            return redirect('account/admin/'.$slug);
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {   
        $profile = Profile::whereSlug($slug)->first();
        if (Auth::user()->type == 'teacher') {
            $teacher = DB::table('teachers')->where('staffId', Auth::user()->loginId)->first();
            $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
            return view('account.showProfile', compact('assigned', 'profile'));
        }
        return view('account.showProfile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($slug)
    {
        $profile = Profile::whereSlug($slug)->first();

        if (Auth::user()->type == 'teacher') {
            $teacher = DB::table('teachers')->where('staffId', Auth::user()->loginId)->first();
            $assigned = SubjectAssigned::where('teacher_id', $teacher->id)->groupBy('classe_id')->get();
            return view('account.editProfile', compact('assigned', 'profile'));
        }
        return view('account.editProfile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $slug)
    {  
        $user = Auth::user();
       $profile = Profile::whereSlug($slug)->first();

        if ($profile) {
            if ($request->hasFile('image')) {
                File::delete(public_path($profile->image));
                $image = $request->file('image');
                $filename = time()."-".$image->getClientOriginalName();
                $path = public_path('img/users/'.$filename);
                Image::make($image->getRealPath())->resize(150, 100)->save($path);
                $profile->image = 'img/users/'.$filename;
            }
            $profile->firstname = $request['firstname'];
            $profile->lastname = $request['lastname'];
            $profile->phone = $request['phone'];
            $profile->dob = $request['dob'];
            $profile->gender = $request['gender'];
            $profile->address = $request['address'];
            $profile->state = $request['state'];
            $profile->nationality = $request['nationality'];
            $profile->update();
            flash(' Your profile was updated successfully!');
            if ($user->type == 'student') {
            return redirect('account/student/'.$user->slug);
            }
            elseif ($user->type == 'profile') {
                return redirect('account/profile/'.$user->slug);
            }
            elseif ($user->type == 'admin') {
                return redirect('account/admin/'.$user->slug);
            }
            return redirect('/');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
