<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refresh' => '$refresh'];
    public $sortBy = 'name';
    public $sortAsc = true;
    public $searchTerm='';

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function render()
    {
        $results = $this->query()
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('slug', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(15);
        return view('livewire.admin.categories',[
            'results'=>$results,
            'categories'=>$this->getCategories()
        ]);
    }
    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return Category::query();
    }
    public function getCategories()
    {
        return Category::pluck('name', 'id')->toArray();
    }
}
