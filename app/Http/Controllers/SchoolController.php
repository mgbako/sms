<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;
use Scholr\Http\Requests\SchoolRequest;
use Scholr\Http\Controllers\Controller;
use Scholr\School;
use Image;
use DB;

class SchoolController extends Controller
{   
    public function __construct()
    {
        $this->middleware('staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        $myschool = DB::table('schools')->first();
        return view('admin.schools.index', compact('schools', 'myschool'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {   
        $school = DB::table('schools')->first();
        if ($school) {
            flash("You already have a school created");
            return redirect('schools');
        }
        $requests = $request->all();
        $image = $request->file('logo');
        $filename = time()."-".$image->getClientOriginalName();
        $path = public_path('img/schools/logos/'.$filename);
        Image::make($image->getRealPath())->resize(170, 100)->save($path);
        $requests['logo'] = 'img/schools/logos/'.$filename;
        $school = new School($requests);
        $school->save();
        flash('You have Successfully added your school details');
        return redirect('schools');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::find($id);
        return view('admin.schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::find($id);
        return view('admin.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $filename = time()."-".$image->getClientOriginalName();
            $path = public_path('img/schools/logos/'.$filename);
            Image::make($image->getRealPath())->resize(150, 100)->save($path);
            $school->logo = 'img/school/logos/'.$filename;
        }
        $school->name = $request['name'];
        $school->term = $request['term'];
        $school->session = $request['session'];
        $school->institution = $request['institution'];
        $school->id_format = $request['id_format'];
        $school->number = $request['number'];
        $school->update();
        flash($school->name.' has been updated successfully');
        return redirect('schools');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
