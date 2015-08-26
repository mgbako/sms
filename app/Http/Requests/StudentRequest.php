<?php namespace Scholr\Http\Requests;

use Scholr\Http\Requests\Request;

class StudentRequest extends Request {

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
			'student_id' => 'required|min:4',
			'nationality' => 'required',
			'email' => 'required|email',
			'dob' => 'required|date',
			'end_date' => 'required',
			'address' => 'required',
			'phone' => 'required',
			'state' => 'required',
			'type' => 'required'
		];
	}

}
