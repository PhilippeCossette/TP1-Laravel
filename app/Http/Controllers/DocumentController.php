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
            'title_fr' => 'required_without:title_en|string|max:255',
            'title_en' => 'required_without:title_fr|string|max:255',
            'file'     => 'required|mimes:pdf,zip,doc,docx|max:5120',
        ], [
            'title_fr.required_without' => __('lang.validation-title-either'),
            'title_en.required_without' => __('lang.validation-title-either'),
        ]);

        $path = $request->file('file')->store('docs', 'public');

        $payload = array_filter([
            'en' => $request->title_en,
            'fr' => $request->title_fr,
        ]);

        Document::create([
            'title'     => $payload,
            'file_path' => $path,
            'user_id'   => Auth::id(),
        ]);

        return redirect()->route('documents.index')->with('success', __('lang.text_success'));
    }

    public function edit(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            return back()->with('error', __('lang.no-authorization'));
        };
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            return back()->with('error', __('lang.no-authorization'));
        }

        $request->validate([
            'title_fr' => 'required_without:title_en|string|max:255',
            'title_en' => 'required_without:title_fr|string|max:255',
            'file'     => 'mimes:pdf,zip,doc,docx|max:5120',
        ], [
            'title_fr.required_without' => __('lang.validation-title-either'),
            'title_en.required_without' => __('lang.validation-title-either'),
        ]);

        $payload = array_filter([
            'en' => $request->title_en,
            'fr' => $request->title_fr
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($document->file_path);
            $path = $request->file('file')->store('docs', 'public');
            $document->file_path = $path;
        }

        $document->title = $payload;
        $document->save();

        return redirect()->route('documents.index')->with('success', __('lang.text_updated'));
    }

    public function destroy(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            return back()->with('error', __('lang.no-authorization'));
        };
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', __('lang.text_deleted'));
    }

    public function download(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            return back()->with('error', __('lang.no-authorization'));
        }

        return response()->download(storage_path('app/public/' . $document->file_path));
    }
}
