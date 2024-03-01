<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class TicketController extends Controller
{

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'nullable|string',
            'user_id' => 'nullable|numeric',
        ]);

        // Create a new ticket instance
        $ticket = new Ticket();
        $ticket->nombre = $validatedData['nombre'];
        $ticket->user_id = $validatedData['user_id'];
        $ticket->save();

        return response()->json(['message' => 'Ticket created successfully']);
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

        $usuarios = DB::select("SELECT * FROM tickets WHERE user_id = $user_id");

        return response()->json([
            'message' => $usuarios
        ]);
    }

}