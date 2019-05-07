<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function profile() {
        $usuario = User::findOrFail( Auth::user()->id );
        return view('admin.profile', compact('usuario'));
    }

    public function update(Request $request)
    {
        $entity = User::findOrFail( Auth::user()->id );
        $data   = $request->all();

        if ( isset( $data['password'] ) ) {
            $entity->password = bcrypt( $data['password']);
            unset($data['password']);
        } else {
            unset($data['password']);
        }

        $entity->fill( $data );
        $entity->save();

        return redirect()->route('admin.profile')->with([
            'status' => 'success',
            'message' => 'Dados atualizados com sucesso.' 
        ]);

    }
}
