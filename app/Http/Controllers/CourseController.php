<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{
    public function index(){
        return view('course.courses')->with('data', Course::all());
    }
    public function edit($id){
        $course = Course::find($id);
        return view('course.edit')->with('data', $course);
    }
    public function submit_edit(){
        $course = Course::find(Input::get('id'));
        $course->grade = Input::get('grade');
        $course->book = Input::get('book');
        $course->save();
        return redirect('/course');
    }
    public function add(){
        $course = new Course;
        $course->grade = Input::get('grade');
        $course->book = Input::get('book');
        $course->save();
        return redirect('/course');
    }
    public function delete($id){
        $course = Course::find($id);
        $course->delete();
        return redirect('/course');
    }
}
