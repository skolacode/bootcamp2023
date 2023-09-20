<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function chats() {
        return view('chat');
    }

    public function create(Request $request) {
        $user = Auth::user();

        $user_id = $user->id;

        $img_path = null;
        
        if($request->hasFile('image')) {
            
            $file = $request->file('image');
            
            // generate unique name
            $randomName = $file->hashName();
            
            $request->file('image')->storeAs('public/images', $randomName);
            $request->file('image')->storeAs('images', $randomName);

            $img_path = 'images/'.$randomName;
        }

        Chat::create([
            'user_id' => $user_id,
            'chat' => $request->chat,
            'img_path' => $img_path
        ]);

        return back();
    }

    public function allChats() {
        $chats = Chat::with('user')->get();


        return response()->json([
            'chats' => $chats
        ]);
    }

    public function allImages() {
        $files = Storage::files('/images');


        return response()->json([
            'images' => $files
        ]);
    }
}
