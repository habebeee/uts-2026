<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return redirect()->to(route('home') . '#contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(route('home') . '#contact')
                ->withErrors($validator)
                ->withInput();
        }

        ContactMessage::create($validator->validated());

        return redirect()
            ->to(route('home') . '#contact')
            ->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
