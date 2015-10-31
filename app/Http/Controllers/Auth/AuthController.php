<?php namespace Scholr\Http\Controllers\Auth;

use Validator;
use Scholr\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Scholr\http\Requests\NewAccountRequest;
use Scholr\User;
use Scholr\Student;
use Scholr\Teacher;
use Scholr\Admin;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    

    use AuthenticatesAndRegistersUsers;

    protected $redirectTo;
    protected $redirectAfterLogout = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => ['getLogout', 'getStudent', 'getTeacher']]);
        $this->auth = $auth;
    }
    /**
     * show admin login area
     */
    public function getAdminlogin()
    {
        return view('account.staffLogin');
    }

    /**
     * shows student login form
     * 
     */
    public function getStudentlogin() {
        return view('account.studentLogin');
    }

    /**
     * show form for teacher login
     * 
     */
    public function getTeacherlogin() {
        return view('account.teacherLogin');
    }

    /**
     * show admin user registration form
     */
    public function getNewadmin()
    {
        return view('account.newStaff');
    }
    public function getNewstudent() {
        return view('account.newStudent');
    }

        /**
     * show teacher regisyration form
     * @return string 
     */
    public function getNewteacher() {
        return view('account.newTeacher');
    }
    public function getAdmin($slug)
    {
        if ($this->auth->check()) {
            $admin = \DB::table('users')->where('slug', $slug)->first();
            return view('account.staffHome', compact('admin'));
        }
    }
    public function getStudent($slug) {
        if ($this->auth->check()) {
            $student = \DB::table('users')->where('slug', $slug)->first();
            return view('account.studentHome', compact('student'));
         }
         return redirect('/');
    }

    public function getTeacher($slug){
        if ($this->auth->check()) {
            $teacher = \DB::table('teachers')->where('slug', $slug)->first();
             return view('account.teacherHome', compact('teacher'));
        }
        return redirect('/');
    }

    /**
     * handle creating admin user account
     * @param  \Illuminate\Http\Request $request 
     * @return \Illuminnate\Http\Response  
     */
    public function postNewadmin(NewAccountRequest $request) {

        $requests = $request->all();
        
        $requests['password'] = bcrypt($requests['password']);
        $requests['type'] = 'admin';
        $admin = Admin::whereStaffid($requests['loginId'])->firstOrFail();
        $user = new User($requests);
        $user->slug = $user->username;
        $this->auth->login($admin->account()->save($user));
        $slug = $this->auth->user()->slug;
        $this->redirectTo = 'account/admin/'.$slug;
        $user = $this->auth->user();
        flash('Welcome '.$user->username  
                        .' Your account was created succeessfully');
        return redirect($this->redirectPath());
    
    }

    /**
     * handels a registration request for student account
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http'Response
     */
    public function postNewstudent(NewAccountRequest $request) {
        $requests = $request->all();
        $requests['password'] = bcrypt($request['password']);
        $requests['type'] = 'student';
        $student = Student::whereStudentid($requests['loginId'])->first();
        $user = new User($requests);
        $user->slug = $user->username;
        $this->auth->login($student->account()->save($user));

        $slug = $this->auth->user()->slug;
        $this->redirectTo = 'account/student/'.$slug;

        $user = $this->auth->user();
        flash('Welcome '.$user->firstname .' '.$user->lastname 
                        .' Your account was created succeessfully');
        return redirect($this->redirectPath());
    }
    /**
     * handle creating teacher account
     * @param  \Illuminate\Http\Request $request 
     * @return \Illuminnate\Http\Response  
     */
    public function postNewteacher(NewAccountRequest $request) {

        $requests = $request->all();
        
        $requests['password'] = bcrypt($requests['password']);
        $requests['type'] = 'teacher';
        $teacher = Teacher::whereStaffid($requests['loginId'])->firstOrFail();
        $user = new User($requests);
        $user->slug = $user->username;
        $this->auth->login($teacher->account()->save($user));
        $slug = $this->auth->user()->slug;
        $this->redirectTo = 'account/teacher/'.$slug;
        $user = $this->auth->user();
        flash('Welcome '.$user->firstname.' '.$user->lastname 
                        .' Your account was created succeessfully');
        return redirect($this->redirectPath());
    
    }


    /**
     * handle admin login
     * @param  \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function postAdminlogin(Request $request){

        $credentials = $request->only('email', 'password');

        

        if ($this->auth->attempt($credentials, $request->has('remember'))){
            $slug = $this->auth->user()->slug;
            $this->redirectTo = 'account/admin/'.$slug;

                $user = $this->auth->user();
        flash('Welcome Back '.$user->firstname.
                ' You have logged in succeessfully');

            return redirect()->intended($this->redirectPath());
        }

        return redirect('/account/adminlogin')
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => $this->getFailedLoginMessage(),
                    ]);
    }


    /**
     * handle student login
     * @param  \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function postStudentlogin(Request $request){

        $credentials = $request->only('email', 'password');

        

        if ($this->auth->attempt($credentials, $request->has('remember'))){
            $slug = $this->auth->user()->slug;
            $this->redirectTo = 'account/student/'.$slug;

                $user = $this->auth->user();
        flash('Welcome Back '.$user->firstname. ' '.$user->lastname 
                        .' You have logged in succeessfully');

            return redirect()->intended($this->redirectPath());
        }

        return redirect('/account/studentlogin')
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => $this->getFailedLoginMessage(),
                    ]);
    }

    /**
     * Handle teacher logining teachers
     * @param  \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function postTeacherlogin(Request $request){

        $credentials = $request->only('email', 'password');
        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            $slug = $this->auth->user()->slug;
            $this->redirectTo = 'account/teacher/'.$slug;

                $user = $this->auth->user();
        flash('Welcome '.$user->firstname.' '.$user->lastname.
                        ' You have logged in succeessfully');

            return redirect()->intended($this->redirectPath());
        }

        return redirect('/account/teacherlogin')
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => $this->getFailedLoginMessage(),
        ]);
        
    }

}
