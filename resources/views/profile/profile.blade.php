@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="z-depth-5" style="background-color: white; margin-bottom: 5%">
            <div style="padding: 10%">
                <form id="form" action="/profile/edit" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col s3">
                            <div class="row">
                                <div class="col s12">
                                    <img src="{{ asset('storage/'.$data['avatar']) }}" id="avatar" class="circle responsive-img z-depth-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    {{--<div class="file-field input-field">--}}
                                        {{--<div class="btn">--}}
                                            {{--<span>File</span>--}}
                                            {{--<input type="file" name="avatar">--}}
                                        {{--</div>--}}
                                        {{--<div class="file-path-wrapper">--}}
                                            {{--<input class="file-path validate" name="avatar" type="text">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col s1"></div>
                        <div class="col s8">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="{{ $data['name'] }}" id="name" type="text" name="name" class="validate">
                                    <label for="name">Name</label>
                                </div>
                                <div class="input-field col s12">
                                    <input value="{{ $data['email'] }}" id="email" type="email" name="email" class="validate">
                                    <label for="surname">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <input placeholder="Change Password" id="password" type="text" name="password" class="validate">
                                    <label for="surname">Password</label>
                                </div>
                            </div>
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
            window.location.href = '/'
        })
    </script>
@endsection