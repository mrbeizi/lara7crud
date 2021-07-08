<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $datas = User::get();
        return view('user.contact', compact('datas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
