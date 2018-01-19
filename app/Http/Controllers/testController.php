<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function test(){
        return \Response::download(public_path().'/minikube-v0.23.6.iso');
    }
    public function localkube(){
        return \Response::download(public_path().'/localkube-linux-amd64');
    }
}
