<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    // List with pagination
    public function index()
    {
        $documents = Document::with('user')
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('documents.index', compact('documents'));
    }

    // Show upload form
    public function create()
    {
        return view('documents.create');
    }

    // Store uploaded file
    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,zip,doc,docx|max:5120'
        ]);

        $path = $request->file('file')->store('docs', 'public');

        Document::create([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'file_path' => $path,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('documents.index')->with('success', __('lang.text_success'));
    }

    // Edit only if you’re owner
    public function edit(Document $document)
    {
        if ($document->user_id !== Auth::id()) abort(403);
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        if ($document->user_id !== Auth::id()) abort(403);

        $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
        ]);

        $document->update($request->only('title_fr', 'title_en'));

        return redirect()->route('documents.index')->with('success', __('lang.text_updated'));
    }

    public function destroy(Document $document)
    {
        if ($document->user_id !== Auth::id()) abort(403);
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', __('lang.text_deleted'));
    }

    public function download(Document $document)
    {
        if (!Auth::check()) abort(403);

        return response()->download(storage_path('app/public/' . $document->file_path));
    }
}
