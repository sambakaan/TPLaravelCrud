<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
	public function index(){
		$students = Student::paginate(4);
		return view('students.index',compact("students"));
	}

	public function create(){
		return view('students.create');
	}

	public function store(Request $request){
		$validatedData = $request->validate([
			'firstname'=> 'required',
			'lastname'=> 'required',
			'email'=> 'required|unique:students|max:255',
			'telephone'=> 'required'
		]);
		$student = new Student;
		$student->first_name = $request->firstname;
		$student->last_name = $request->lastname;
		$student->email = $request->email;
		$student->phone = $request->telephone;
		$res = $student->save();
		return redirect(route('home'))->with('successMsg','L\'etudiant a bien ete ajoute!!!');
	}

	public function edit($id){
		$student = Student::find($id);
		return view('students.edit',compact('student'));

	}

	public function update(Request $request, $id){
		$validatedData = $request->validate([
			'firstname'=> 'required',
			'lastname'=> 'required',
			'email'=> 'required',
			'telephone'=> 'required'
		]);

		$student = Student::find($id);
		$student->first_name = $request->firstname;
		$student->last_name = $request->lastname;
		$student->email = $request->email;
		$student->phone = $request->telephone;
		$res = $student->save();
		return redirect(route('home'))->with('successMsg','L\'etudiant a bien ete modifie !!!');

	}

	public function delete($id){
		Student::find($id)->delete();
		return redirect(route('home'))->with('successMsg','L\'etudiant a bien ete Supprime !!!');

	}
}
