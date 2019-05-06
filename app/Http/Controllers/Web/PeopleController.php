<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Person;
use App\Models\Aux\State;

use App\Http\Requests\Person\StoreRequest;

class PeopleController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::all();
        return view('web.people.create', compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            $data = $request->all();
            $data['birthdate'] = (\DateTime::createFromFormat('d/m/Y', $data['birthdate']))->format('Y-m-d');
            
            $person = Person::create( $data );
            return redirect()->route('web.pessoas.sucesso')->with([
                'person' => $person
            ]);
        } catch(\Exception $e) {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Ocorreu um erro. Tente novamente.'
            ]);
        }
    }

    public function confirmation() {
        return view('web.people.success');
    }
}
