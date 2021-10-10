<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function accessSessionData(Request $request)
    {
        if ($request -> session() ->get('info'))
            echo $request->session()->get('info');

        else
            echo 'No data in the session';
    }

    public function storeSessionData(Request $request)
    {
        $request->session()->put('info', 'Getting things done');
        echo 'Data has been added to session';
    }

    public function deleteSessionData (Request $request)
    {
        if ($request -> session() ->get('info')){
            $request->session()->forget('info');
            echo 'Data has been deleted successfully in the session';
        }

    }
}
