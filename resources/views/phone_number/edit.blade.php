@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="z-depth-5" style="background-color: white">
            <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
                <form action="/teacher/submit_edit" id="form">
                    <input type="hidden" value="{{ $data['id'] }}" name="id">
                    <div class="row">
                        <div class="col s6">
                            <label for="name">Name</label>
                            <input placeholder="{{ $data['name'] }}" id="name" name="name" class="validate">
                        </div>
                        <div class="col s6">
                            <label for="surname">Surname</label>
                            <input placeholder="{{ $data['surname'] }}" id="surname" name="surname" class="validate">
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
            window.location.href = '/teacher'
        })
    </script>
@endsection