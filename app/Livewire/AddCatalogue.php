<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class AddCatalogue extends Component
{
    public function render()
    {
        return view('livewire.add-catalogue', [
            'categories' => Category::all()
        ]);
    }
}
