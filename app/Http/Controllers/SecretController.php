<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secret;

class SecretController extends Controller
{
    public function index()
    {
        $secrets = Secret::with('user')->paginate(5);
        return view('dashboard', compact('secrets'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('secrets', 'public');
        }

        Secret::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'file' => $filePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Secret created successfully!');
    }
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $secret = Secret::findOrFail($id);
        $secret->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        return redirect()->back()->with('success', 'Secret updated successfully!');
    }
    
    public function destroy($id) {
        $secret = Secret::findOrFail($id);
        $secret->delete();
    
        return redirect()->back()->with('success', 'Secret deleted successfully!');
    }
}
