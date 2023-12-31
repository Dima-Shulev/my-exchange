<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCheckMailRequest;
use App\Http\Requests\ValidateEntranceRequest;
use Illuminate\Http\Request;
use App\Models\User;


class LogController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function store(ValidateEntranceRequest $request)
    {
        $login = User::select('id', 'name', 'email', 'password', 'active', 'balance', 'status','avatar')->where('email', '=', $request->input('email'))->orderBy('id', 'ASC')->first();
        return user_entrance($login,$request);
    }

    public function forget(){
        return view('login.forget');
    }

    public function checkMail(ValidateCheckMailRequest $request){
        $validate = $request->validated();
        $check = User::select('email','id')->where('email', $validate['email'])->orderBy('id','ASC')->first();
        return send_mail($check,$validate);
    }

    public function check(){
        return view('login.check');
    }

    public function checkCode(Request $request)
    {
        return check_code($request);
    }

    public function change($id){
        return view('login.change',compact('id'));
    }

    public function changePass(Request $request){
        $change = User::find((int)$request->id);
        return change_pass($change,$request);
    }
}
