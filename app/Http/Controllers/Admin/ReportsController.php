<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Aux\State;
use App\Models\Person;

class ReportsController extends Controller
{
    public function index() {
        $state = State::all();
        return view('admin.reports.index', compact('state'));
    }

    public function generate_report(Request $request) {
        $query = [];

        if ( $request->has('name') && ($request->input('name') != null) ) {
            $query[] = ['name', '=', $request->input('name')];
        }

        if ( $request->has('voterid') && ($request->input('voterid') != null) ) {
            $query[] = ['voterid', '=', $request->input('voterid')];
        }

        if ( $request->has('birthdate') && ($request->input('birthdate') != null) ) {
            $query[] = ['birthdate', '=', $request->input('birthdate')];
        }

        if ( $request->has('startdate') && ($request->input('startdate') != null) ) {
            $query[] = ['birthdate', '>=', $request->input('startdate')];
        }

        if ( $request->has('enddate') && ($request->input('enddate') != null) ) {
            $query[] = ['birthdate', '<=', $request->input('enddate')];
        }

        if ( $request->has('state') && ($request->input('state') != null) ) {
            $query[] = ['state', '=', $request->input('state')];
        }

        if ( $request->has('city') && ($request->input('city') != null) ) {
            $query[] = ['city', '=', $request->input('city')];
        }

        if ( $request->has('street') && ($request->input('street') != null) ) {
            $query[] = ['street', '=', $request->input('street')];
        }

        if ( $request->has('neighborhood') && ($request->input('neighborhood') != null) ) {
            $query[] = ['neighborhood', '=', $request->input('neighborhood')];
        }

        if ( $request->has('zipcode') && ($request->input('zipcode') != null) ) {
            $query[] = ['zipcode', '=', $request->input('zipcode')];
        }

        $people = Person::where( $query )->get();

        return view('admin.reports.report', compact('people'));
    }
}
