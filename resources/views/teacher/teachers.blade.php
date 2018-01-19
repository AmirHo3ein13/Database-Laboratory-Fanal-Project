@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="z-depth-5" style="background-color: white; margin-bottom: 5%">
            <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
                <form action="/teacher/add" id="form">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="name" type="text" name="name" class="validate">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="surname" type="text" name="surname" class="validate">
                            <label for="surname">Surname</label>
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
                        <th>Name</th>
                        <th>Surname</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                            <tr>
                                <td>
                                    <p>
                                        <input class="with-gap" name="group" type="radio" id="{{$row['id']}}"  />
                                        <label for="{{$row['id']}}"></label>
                                    </p>
                                </td>
                                <td>{{ $row['name'] }}</td>
                                <td>{{ $row['surname'] }}</td>
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
            window.location.href = '/teacher/edit/' + $('input[name=group]:checked').attr('id')
        });
        $('#deleteButton').click(function () {
            window.location.href = '/teacher/delete/' + $('input[name=group]:checked').attr('id')
        });
        $('#back').click(function () {
            window.location.href = '/'
        });
        $('#submit').click(function () {
            $('#form').submit()
        })
    </script>
@endsection