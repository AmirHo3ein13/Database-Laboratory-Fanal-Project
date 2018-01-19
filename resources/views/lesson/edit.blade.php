@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="z-depth-5" style="background-color: white">
            <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
                <form action="/lesson/submit_edit" id="form">
                    <input type="hidden" value="{{ $data['lesson']['id'] }}" name="id">
                    <div class="row">
                        <div class="input-field col s5">
                            <select name="teacher" id="teacher">
                                @foreach($data['teachers'] as $teacher)
                                    @if($data['lesson']['teacher_id'] == $teacher['id'])
                                        <option value="{{ $teacher['id'] }}" selected>
                                            {{ $teacher['name'].' '.$teacher['surname'] }}
                                        </option>
                                    @else
                                        <option value="{{ $teacher['id'] }}">
                                            {{ $teacher['name'].' '.$teacher['surname'] }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="teacher">Teacher</label>
                        </div>
                        <div class="input-field col s5">
                            <select name="course" id="course">
                                @foreach($data['courses'] as $course)
                                    @if($data['lesson']['course_id'] == $course['id'])
                                        <option value="{{ $course['id'] }}" selected>
                                            {{ $course['grade'].' - '.$course['book'] }}
                                        </option>
                                    @else
                                        <option value="{{ $course['id'] }}">
                                            {{ $course['grade'].' - '.$course['book'] }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="course">Course</label>
                        </div>
                        <div class="input-field col s2">
                            <input value="{{ $data['lesson']['number'] }}" required id="number" name="number" type="number" min="1" class="validate">
                            <label for="number">First Name</label>
                        </div>
                    </div>
                </form>
                <button class="btn waves-effect waves-light" id="submit">Submit
                    <i class="material-icons right">send</i>
                </button>
                <button class="btn waves-effect waves-light right amber darken-3" id="back">Back
                    <i class="material-icons right">keyboard_return</i>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#submit').click(function () {
            $('#form').submit()
        });
        $('#back').click(function () {
            window.location.href = '/lesson'
        })
        $(document).ready(function() {
            $('#course').material_select();
            $('#teacher').material_select();
        });
    </script>
@endsection