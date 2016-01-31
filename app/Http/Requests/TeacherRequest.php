<?php namespace Scholr\Http\Requests;

use Scholr\Http\Requests\Request;

class TeacherRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'firstname' => 'required|min:4|max:25',
			'lastname' => 'required|min:4|max:25',
			'staffId' => 'required|min:4',
			'nationality' => 'required',
			'gender' => 'required',
			'email' => 'required|email|unique:teachers',
			'dob' => 'required|date',
			'address' => 'required',
			'phone' => 'required',
			'state' => 'required',
		];
	}

}
