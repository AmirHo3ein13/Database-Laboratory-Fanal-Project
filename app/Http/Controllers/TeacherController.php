<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class TeacherController extends Controller
{
    public function index(){
        return view('teacher.teachers')->with('data', Teacher::all());
    }
    public function edit($id){
        $teacher = Teacher::find($id);
        return view('teacher.edit')->with('data', $teacher);
    }
    public function submit_edit(){
        $teacher = Teacher::find(Input::get('id'));
        $teacher->name = Input::get('name');
        $teacher->surname = Input::get('surname');
        $teacher->save();
        return redirect('/teacher');
    }
    public function add(){
        $teacher = new Teacher;
        $teacher->name = Input::get('name');
        $teacher->surname = Input::get('surname');
        $teacher->save();
        return redirect('/teacher');
    }
    public function delete($id){
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect('/teacher');
    }
}
