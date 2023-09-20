<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    public function chats() {
        return view('chat');
    }
}
