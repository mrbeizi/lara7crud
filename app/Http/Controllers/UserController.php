<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        $datas = User::get();
        return view('user.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $count = User::where('email',$request->input('email'))->count();

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'level' => 'required'
        ],[
            'name.required' => 'Nama jenjang tidak boleh kosong.',
            'name.min' => 'Nama minimal 4 karakter',
            'email.unique' => 'Email anda sudah terdaftar',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => bcrypt(($request->input('password')))
        ]);

        return redirect('data-user')->withToastSuccess('Data Created Successfully!');
    }

    public function update(Request $request,$id)
    {
        $datas = User::findOrFail($id);

        $datas->name = $request->input('name');
        $datas->email = $request->input('email');
        $datas->level = $request->input('level');
        if($request->input('password')) {
            $datas->password = bcrypt(($request->input('password')));
        
        }

        $datas->update();

        return redirect('data-user')->withToastSuccess('Data updated successfully!');
    }

    public function show()
    {
        $datas = User::get();
        return view('user.index', compact('datas'));
    }

    public function destroy($id)
    {
        if(Auth::user()->id != $id) {
            User::whereId($id)->delete();
            return redirect('data-user')->withToastSuccess('Data removed successfully!');
        } else {
            return redirect('data-user')->withToastError('Failed! You can not remove your own account!');
        }
    }
    
}
