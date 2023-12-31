<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Log;

class GuestbookController extends Controller
{
    // Display the guestbook entries
    public function viewbook()
    {
        $guests = Guest::all();
        return view('guestbook.view', compact('guests'));
    }

    // Store a new guestbook entry
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        try {
            Guest::create([
                'name' => $request->input('name'),
                'message' => $request->input('message'),
            ]);
        } catch (\Exception $e) {
            // Log the error
            \Illuminate\Support\Facades\Log::error('Error saving guestbook entry: ' . $e->getMessage());
            // Return an error response or redirect back with an error message
            return redirect()->back()->with('error', 'Failed to save the guestbook entry.');
        }

        return redirect()->route('account-sign-in');
    }
}
