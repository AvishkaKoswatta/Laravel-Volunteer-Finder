<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index()
{
    $forms = Form::all(); // Example query to retrieve forms
    return view('forms.index', ['forms' => $forms]);
}


public function create()
{
    return view('forms.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $data['user_id'] = Auth::id();
    Form::create($data);

    return redirect()->route('form.index');
}

public function edit(Form $form)
{
    if ($form->user_id !== Auth::id()) {
        abort(403);
    }
    return view('forms.edit', ['form' => $form]);
}

public function update(Request $request, Form $form)
{
    if ($form->user_id !== Auth::id()) {
        abort(403);
    }

    $data = $request->validate([
        'description' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        if ($form->image) {
            Storage::disk('public')->delete($form->image);
        }
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $form->update($data);

    return redirect()->route('form.index');
}

public function destroy(Form $form)
{
    if ($form->user_id !== Auth::id()) {
        abort(403);
    }

    if ($form->image) {
        Storage::disk('public')->delete($form->image);
    }

    $form->delete();

    return redirect()->route('form.index');
}

}
