@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="z-depth-5" style="background-color: white; margin-bottom: 5%">
            <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
                <form action="/project/add" id="form">
                    <div class="row">
                        <div class="input-field col s9">
                            <select name="lesson" id="lesson">
                                <option value="" disabled selected>Choose Lesson</option>
                                @foreach($data['lessons'] as $lesson)
                                    <option value="{{ $lesson['id'] }}">
                                        {{ $lesson['course']['grade'].' - '.$lesson['course']['book'].
                                        ' - '.$lesson['teacher']['name'].' '.$lesson['teacher']['surname'].
                                         ' - '.$lesson['number']}}
                                    </option>
                                @endforeach
                            </select>
                            <label for="lesson">Lesson</label>
                        </div>
                        <div class="input-field col s3">
                            <input placeholder="name" required id="name" name="name" type="text" minlength="3" maxlength="3" class="validate">
                            <label for="name">Name</label>
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
                        <th>Lesson</th>
                        <th>number</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data['projects'] as $row)
                            <tr>
                                <td>
                                    <p>
                                        <input class="with-gap" name="group" type="radio" id="{{$row['id']}}"  />
                                        <label for="{{$row['id']}}"></label>
                                    </p>
                                </td>
                                <td>{{ $row['grade'] }}</td>
                                <td>{{ $row['book'] }}</td>
                                <td>{{ $row['teacher_name'].' '.$row['surname'] }}</td>
                                <td>{{ $row['number'] }}</td>
                                <td>{{ $row['name'] }}</td>
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
            window.location.href = '/project/edit/' + $('input[name=group]:checked').attr('id')
        });
        $('#deleteButton').click(function () {
            window.location.href = '/project/delete/' + $('input[name=group]:checked').attr('id')
        });
        $('#back').click(function () {
            window.location.href = '/'
        });
        $('#submit').click(function () {
            $('#form').submit()
        });
        $(document).ready(function() {
            $('#lesson').material_select();
        });
    </script>
@endsection