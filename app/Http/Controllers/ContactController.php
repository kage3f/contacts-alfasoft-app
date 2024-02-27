<?php

namespace App\Http\Controllers;
use App\Models\Contact; 

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->query('search');
    
        if ($searchTerm) {
            $contacts = Contact::where('name', 'LIKE', "%{$searchTerm}%")
                                ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                                ->paginate(10);
        } else {
            $contacts = Contact::paginate(10);
        }
    
        return view('contacts.index', compact('contacts'));
    }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create'); 
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'contact' => 'required|digits:9|unique:contacts',
            'email' => 'required|email|unique:contacts'
        ]);
    
        Contact::create($request->all()); 
    
        return redirect()->route('contacts.index')
                         ->with('success', 'Contact added successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|min:6',
            'contact' => 'required|digits:9|unique:contacts,contact,' . $contact->id,
            'email' => 'required|email|unique:contacts,email,' . $contact->id
        ]);

        $contact->update($request->all()); // Atualiza o contato

        return redirect()->route('contacts.index')
        ->with('success', 'Contact updated successfully.')
        ->with('editedContactId', $contact->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete(); // Deleta o contato (soft delete)

        return redirect()->route('contacts.index')
                        ->with('success', 'Contact deleted successfully.');
    }

    

}
