<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
// use App\Models\Category;
// use Illuminate\Http\Request;
// use Livewire\WithPagination;

class Counter extends Component
{

        // use WithPagination;

    public $showModal = false;

    public function render()
    {
        // $contacts = Contact::with('category')->paginate(1);
        $contact = Contact::with('category')->find(1);
        // $categories = Category::all();




        return view('livewire.counter',compact('contact',));
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }



}
