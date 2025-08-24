<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{


    public $showModal = false;

    public function render()
    {






        return view('livewire.counter');
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
