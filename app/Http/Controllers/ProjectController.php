<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function index(){
        $projects = \DB::table('projects')
            ->join('lessons','lesson_id', '=', 'lessons.id')
            ->join('teachers', 'lessons.teacher_id', '=', 'teachers.id')
            ->join('courses','courses.id','=','lessons.course_id')
            ->select('projects.*', 'lessons.number', 'teachers.name as teacher_name',
                'teachers.surname', 'courses.grade', 'courses.book')
            ->get();
        $lessons = Lesson::all();
        foreach ($lessons as $lesson){
            $lesson->teacher;
            $lesson->course;
        }
        return view('project.projects')->with('data',
            ['projects' => json_decode($projects, true), 'lessons' => $lessons]);
    }
    public function edit($id){
        $project = Project::find($id);
        $project->lesson;

        $lessons = Lesson::all();
        foreach ($lessons as $lesson){
            $lesson->teacher;
            $lesson->course;
        }
        return view('project.edit')->with('data',
            ['project' => $project, 'lessons' => $lessons]);
    }
    public function submit_edit(){
        $project = Project::find(Input::get('id'));
        $project->name = Input::get('name');
        $project->lesson_id = Input::get('lesson');
        $project->save();
        return redirect('/project');
    }
    public function add(){
        $project = new Project;
        $project->name = Input::get('name');
        $project->lesson_id = Input::get('lesson');
        $project->save();
        return redirect('/project');
    }
    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        return redirect('/project');
    }
}
