<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {

        $path = $request->file->store('uploads');
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $message = $request->message;

        return response()->json([
            "success" => true,
            "result" => ['firstname' => $firstname, 'lastname' => $lastname, 'message' => $message, 'path' => $path],
        ]);
    }
}
