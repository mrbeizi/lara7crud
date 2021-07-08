<?php

namespace App\Http\Controllers;
use App\People;
use Session;
use Auth;
use Validator;

use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $datas = People::get();
        return view('people.index', compact('datas'));
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
        $datas = People::get();
        return view('people.index', compact('datas'));
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
        if(Auth::user()->id != $id) {
            People::whereId($id)->delete();
            return redirect('data-people')->withToastSuccess('Data removed successfully!');
        } else {
            return redirect('data-people')->withToastError('Failed! You can not remove your own account!');
        }
    }
}
