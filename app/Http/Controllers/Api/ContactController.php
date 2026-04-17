<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    /** Public: submit contact form */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        $contact = Contact::create($data);

        // Send email notification (silently fail if mail not configured)
        try {
            Mail::to(config('mail.to_address', env('MAIL_TO_ADDRESS')))
                ->send(new ContactMail($contact));
        } catch (\Exception $e) {
            // Log but don't block the response
            \Log::warning('Contact mail failed: ' . $e->getMessage());
        }

        return response()->json([
            'message' => 'Message received! I will get back to you soon.',
        ], 201);
    }

    /** Admin: list all messages */
    public function index()
    {
        return response()->json(
            Contact::orderByDesc('created_at')->get()
        );
    }

    /** Admin: mark as read */
    public function markRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return response()->json($contact);
    }

    /** Admin: delete */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(['message' => 'Message deleted.']);
    }
}
