<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            "title" => "required|string|max:255",
            "email" => "required|email",
            "message" => "required|string",
            "attachment" => "nullable|file"
        ]);

        $newContact = Contact::create($data);

        return response()->json($newContact);

    }
}
