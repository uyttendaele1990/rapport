<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\student;
use App\test;
use App\categorie;

class schoolController extends Controller
{
    public function index(){
    	$students = student::select('*')->with('school')->get();
    	$tests = School::select('*')->where('categorie_id', 1)->with('test_name')->get();
    	$exams = School::select('*')->where('categorie_id', 2)->with('test_name')->get();
    	$vaks= test::all();
    	$som= 0;
    	$max= 0;
    	$teller= 0;
    	return view('welcome', compact('students', 'som', 'teller', 'tests', 'exams', 'vaks', 'max'));
    }
}
