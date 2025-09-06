<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Simple hardcoded admin credentials for now
        // In production, you should use proper user authentication
        if ($request->username === 'admin' && $request->password === 'admin123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['credentials' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        $unreadCount = Contact::where('is_read', false)->count();
        $totalCount = Contact::count();

        return view('admin.dashboard', compact('contacts', 'unreadCount', 'totalCount'));
    }

    public function showContact($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $contact = Contact::findOrFail($id);
        
        // Mark as read if not already read
        if (!$contact->is_read) {
            $contact->update([
                'is_read' => true,
                'read_at' => now()
            ]);
        }

        return view('admin.contact-show', compact('contact'));
    }

    public function markAsRead($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $contact = Contact::findOrFail($id);
        $contact->update([
            'is_read' => true,
            'read_at' => now()
        ]);

        return back()->with('success', 'Contact marked as read');
    }

    public function markAsUnread($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $contact = Contact::findOrFail($id);
        $contact->update([
            'is_read' => false,
            'read_at' => null
        ]);

        return back()->with('success', 'Contact marked as unread');
    }

    public function deleteContact($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Contact deleted successfully');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}