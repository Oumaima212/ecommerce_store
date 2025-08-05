<?php
namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    use WithPagination;

    public $showPagination = false;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.product-list', [
            'products' => $this->showPagination
            ? Product::paginate(20) :
             Product::latest()->take(4)->get()
        ]);
    }
}



