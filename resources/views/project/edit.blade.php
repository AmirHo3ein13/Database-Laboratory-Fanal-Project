@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="z-depth-5" style="background-color: white">
            <div class="container" style="padding-top: 5%; padding-bottom: 5%;">
                <form action="/project/submit_edit" id="form">
                    <input type="hidden" value="{{ $data['project']['id'] }}" name="id">
                    <div class="row">
                        <div class="input-field col s8">
                            <select name="lesson" id="lesson">
                                <option value="" disabled selected>Choose Lesson</option>
                                @foreach($data['lessons'] as $lesson)
                                    @if($lesson['id'] == $data['project']['lesson_id'])
                                        <option value="{{ $lesson['id'] }}" selected>
                                            {{ $lesson['course']['grade'].' - '.$lesson['course']['book'].
                                            ' - '.$lesson['teacher']['name'].' '.$lesson['teacher']['surname'].
                                             ' - '.$lesson['number']}}
                                        </option>
                                    @else
                                        <option value="{{ $lesson['id'] }}">
                                            {{ $lesson['course']['grade'].' - '.$lesson['course']['book'].
                                            ' - '.$lesson['teacher']['name'].' '.$lesson['teacher']['surname'].
                                             ' - '.$lesson['number']}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="lesson">Lesson</label>
                        </div>
                        <div class="input-field col s3">
                            <input value="{{ $data['project']['name'] }}" required id="name" name="name" type="text" minlength="3" maxlength="3" class="validate">
                            <label for="name">Letter</label>
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
            window.location.href = '/project'
        });
        $(document).ready(function() {
            $('#lesson').material_select();
        });
    </script>
@endsection