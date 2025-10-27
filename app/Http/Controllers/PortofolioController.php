<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::where('is_active', true)->get();
        
        return view('portofolio.index', compact('socialLinks'));
    }
    
    public function storeContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        
        Contact::create($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message! I will get back to you soon.'
        ]);
    }
    
    // Admin methods
   public function adminContacts(Request $request)
    {
        // Simple password check
        $validPassword = env('ADMIN_PASSWORD', 'admin123');
        $providedPassword = $request->get('password');
        
        if ($providedPassword !== $validPassword) {
            abort(403, 'Unauthorized access. Please provide correct password.');
        }

        $contacts = Contact::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }
}
