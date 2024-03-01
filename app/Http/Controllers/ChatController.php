<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\mensage;

class ChatController extends Controller
{

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'string',
            'ticket_id' => 'numeric',
        ]);

        // Obtener el ID del usuario autenticado
        $user_id = auth()->id();

        // Create a new ticket instance
        $ticket = new mensage();
        $ticket->descripcion = $validatedData['descripcion'];
        $ticket->ticket_id = $validatedData['ticket_id'];
        $ticket->user_id = $user_id;
        $ticket->save();

        return response()->json(['message' => 'message created successfully']);
    }

    public function session()
    {
        $usuario = Auth::user();
        return view('MenuPanel')->with('usuario', $usuario);
    }

    public function select(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'nullable|numeric',
        ]);

        $user_id = $validatedData['user_id'];

        $mensage = DB::select("SELECT descripcion FROM mensage WHERE user_id = $user_id");

        return response()->json([
            'message' => $mensage
        ]);
    }


    public function users(Request $request)
    {
        $user_id = auth()->id();

        $users = DB::select("SELECT * FROM tickets where user_id = $user_id");

        return response()->json([
            'users' => $users
        ]);
    }

    public function admin(Request $request)
    {
        $admin = DB::select("SELECT * FROM tickets");

        return response()->json([
            'admin' => $admin
        ]);
    }

    public function mensajes(Request $request)
    {
        $validatedData = $request->validate([
            'ticket_id' => 'numeric',
        ]);

        $user_id = auth()->id();
        $ticketid = $validatedData['ticket_id'];

        $mensaje = DB::select("SELECT * FROM mensage where ticket_id = $ticketid");

        return response()->json([
            'mensaje' => $mensaje,
        ]);
    }
}