<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Catalogues extends Component
{
    public function render()
    {
        return view('livewire.catalogues', [
            'catalogues' => Product::latest()->get()
        ]);
    }
}
