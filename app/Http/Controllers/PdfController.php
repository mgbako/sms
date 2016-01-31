<?php

namespace Scholr\Http\Controllers;

use Illuminate\Http\Request;

use Scholr\Http\Requests;
use Scholr\Http\Controllers\Controller;

class PdfController extends Controller
{
  public function github (){

	 return \PDF::loadFile('http://www.github.com')->download('github.pdf'); 
	}
}
