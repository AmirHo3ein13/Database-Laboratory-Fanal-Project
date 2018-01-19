@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="z-depth-5" style="background-color: white; margin-bottom: 5%">
            <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
                <form action="/lesson/add" id="form">
                    <div class="row">
                        <div class="input-field col s5">
                            <select name="teacher" id="teacher">
                                <option value="" disabled selected>Choose Teacher</option>
                                @foreach($data['teachers'] as $teacher)
                                    <option value="{{ $teacher['id'] }}">
                                        {{ $teacher['name'].' '.$teacher['surname'] }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="teacher">Teacher</label>
                        </div>
                        <div class="input-field col s5">
                            <select name="course" id="course">
                                <option value="" disabled selected>Choose Course</option>
                                @foreach($data['courses'] as $course)
                                    <option value="{{ $course['id'] }}">
                                        {{ $course['grade'].' - '.$course['book'] }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="course">Course</label>
                        </div>
                        <div class="input-field col s2">
                            <input placeholder="number" required id="number" name="number" type="number" min="1" class="validate">
                            <label for="number">First Name</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" id="submit" name="action">Add
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
        <div class="z-depth-5" style="background-color: white; margin-bottom: 10%">
            <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
                <table class="highlight">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Grade</th>
                        <th>Book</th>
                        <th>Teacher</th>
                        <th>Number</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data['lessons'] as $row)
                            <tr>
                                <td>
                                    <p>
                                        <input class="with-gap" name="group" type="radio" id="{{$row['id']}}"  />
                                        <label for="{{$row['id']}}"></label>
                                    </p>
                                </td>
                                <td>{{ $row['course']['grade'] }}</td>
                                <td>{{ $row['course']['book'] }}</td>
                                <td>{{ $row['teacher']['name'].' '.$row['teacher']['surname'] }}</td>
                                <td>{{ $row['number'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="waves-effect waves-light btn" id="editButton" style="margin-top: 5%">
                    <i class="material-icons left">edit</i>
                    Edit
                </button>
                <button class="waves-effect waves-light btn red" id="deleteButton" style="margin-top: 5%">
                    <i class="material-icons left">delete_forever</i>
                    Delete
                </button>
                <button class="btn waves-effect waves-light right amber darken-3" id="back" style="margin-top: 5%">Back
                    <i class="material-icons right">keyboard_return</i>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#editButton').click(function () {
            window.location.href = '/lesson/edit/' + $('input[name=group]:checked').attr('id')
        });
        $('#deleteButton').click(function () {
            window.location.href = '/lesson/delete/' + $('input[name=group]:checked').attr('id')
        });
        $('#back').click(function () {
            window.location.href = '/'
        });
        $('#submit').click(function () {
            $('#form').submit()
        })
        $(document).ready(function() {
            $('#course').material_select();
            $('#teacher').material_select();
        });
    </script>
@endsection