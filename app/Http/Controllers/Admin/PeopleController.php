<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Person;

class PeopleController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('admin.people.index', compact('people'));
    }

    
    public function show($id)
    {
        $person = Person::findOrFail( $id );
        return view('admin.people.show', compact('person'));
    }

    
    public function destroy($id)
    {
        $person = Person::findOrFail( $id );
        $person->delete();
        return redirect()->back();
    }
}
