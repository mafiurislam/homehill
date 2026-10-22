<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'destination' => 'nullable|string|max:255',
            'from_location' => 'nullable|string|max:255',
            'members' => 'nullable|string|max:50',
            'message' => 'nullable|string',
            'package_name' => 'nullable|string|max:255',
            'type' => 'nullable|string|in:booking,quick_inquiry,contact',
        ]);

        $inquiry = Inquiry::create([
            'full_name' => $validated['full_name'],
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'] ?? null,
            'destination' => $validated['destination'] ?? null,
            'from_location' => $validated['from_location'] ?? null,
            'members' => $validated['members'] ?? '1',
            'message' => $validated['message'] ?? null,
            'package_name' => $validated['package_name'] ?? null,
            'type' => $validated['type'] ?? 'booking',
            'status' => 'new',
        ]);

        // Prefilled WhatsApp link for seamless client handover
        $waMessage = "Hello Hills Home Travels!%0A"
            . "I would like to enquire about: " . urlencode($inquiry->package_name ?? $inquiry->destination ?? 'Tour Package') . "%0A"
            . "Name: " . urlencode($inquiry->full_name) . "%0A"
            . "Phone: " . urlencode($inquiry->contact_number) . "%0A";
            
        if ($inquiry->destination) {
            $waMessage .= "Destination: " . urlencode($inquiry->destination) . "%0A";
        }
        if ($inquiry->from_location) {
            $waMessage .= "Departure: " . urlencode($inquiry->from_location) . "%0A";
        }
        if ($inquiry->members) {
            $waMessage .= "Travelers: " . urlencode($inquiry->members) . "%0A";
        }
        if ($inquiry->message) {
            $waMessage .= "Note: " . urlencode($inquiry->message);
        }

        $whatsappUrl = "https://wa.me/919088877795?text=" . $waMessage;

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your inquiry has been received. Our travel expert will contact you shortly.',
                'whatsapp_url' => $whatsappUrl,
                'inquiry' => $inquiry,
            ]);
        }

        return back()->with('success', 'Thank you! Your inquiry has been submitted successfully. We will get back to you shortly.');
    }
}
