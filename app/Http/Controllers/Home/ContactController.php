<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $path = 'contact';
        if (request()->path() != trans($path)) {
            return redirect(trans($path));
        }
        return view('home.' . $path . '.index');
    }

    public function createContact(Request $request)
    {
        $input = $request->all();
        $contract = Contact::create($input);

        return response([
            'data' => $contract,
            'success' => true,
            'message' => ''
        ], 200);
    }
}
