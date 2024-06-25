<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getLogin()
    {
        //
        return view('backend.login');
    }

    public function postLogin(Request $request){

        $arr=['email'=>$request->email,'password'=> $request->password];
        if ($request->remember === 'Remember Me') {
            $remember = true;
        } else {
            $remember = false;
        }
        if(Auth::attempt($arr)){
            return redirect()->intended('admin/home');
           

        }else {
            return back()->withInput()->withErrors(['error' => 'Tài khoản hoặc mật khẩu chưa đúng']);
        }

    }









    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
