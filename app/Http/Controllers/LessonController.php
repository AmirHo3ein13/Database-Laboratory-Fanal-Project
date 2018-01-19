<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LessonController extends Controller
{
    public function index(){
        $lessons = Lesson::all();
        foreach ($lessons as $lesson){
            $lesson->teacher;
            $lesson->course;
        }
        return view('lesson.lessons')->with('data',
            ['lessons' => $lessons, 'courses' => Course::all(), 'teachers' => Teacher::all()]);
    }
    public function edit($id){
        $lesson = Lesson::find($id);
        $lesson->teacher;
        $lesson->course;
        return view('lesson.edit')->with('data',
            ['lesson' => $lesson, 'courses' => Course::all(), 'teachers' => Teacher::all()]);
    }
    public function submit_edit(){
        $lesson = Lesson::find(Input::get('id'));
        $lesson->number = Input::get('number');
        $lesson->teacher_id = Input::get('teacher');
        $lesson->course_id = Input::get('course');
        $lesson->save();
        return redirect('/lesson');
    }
    public function add(){
        $lesson = new Lesson;
        $lesson->number = Input::get('number');
        $lesson->teacher_id = Input::get('teacher');
        $lesson->course_id = Input::get('course');
        $lesson->save();
        return redirect('/lesson');
    }
    public function delete($id){
        $lesson = Lesson::find($id);
        $lesson->delete();
        return redirect('/lesson');
    }
}
