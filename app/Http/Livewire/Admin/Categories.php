<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
Use Alert;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public $parent;

    // Model Fields
    public $modal_title="Create New";
    public $modal_btn='Save';
    public $modal_action='add';
    public $modelId;
    public $name;
    public $parent_id;
    public $slug;
    public $is_active;

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($this->modelId)],
        ];
    }

    public function categoryAction($val, $id)
    {
        $this->reset();
        switch($val){
            case 'add':
                $this->resetValidation();
                $this->modal_title="Create New";
                $this->modal_btn='Save';
                $this->modal_action='add';
                $this->parent_id=0;
                $this->dispatchBrowserEvent('modal', ['modal'=>'categoryModal', 'action'=>'show']);
                break;
            case 'edit':
                $data = Category::findOrFail($id);
                $this->modelId=$id;
                $this->name= $data->name;
                $this->slug= $data->slug;
                $this->parent_id= $data->parent_id;
                $this->is_active = $data->is_active;
                $this->dispatchBrowserEvent('modal', ['modal'=>'categoryModal', 'action'=>'show']);
                break;
        }

    }

    public function categoryCrud()
    {
        $this->validate();
        switch($this->modal_action)
        {
            case 'add':
                Category::create($this->modelData());
                Alert::success('Success Title', 'Success Message');
                break;
        }
        $this->reset();
        $this->dispatchBrowserEvent('modal', ['modal'=>'categoryModal', 'action'=>'hide']);
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'parent_id' => $this->parent_id,
            'is_active' => $this->is_active
        ];
    }
    public function mount()
    {
        //$this->resetPage();
    }

    public function render()
    {
        $data = Category::paginate(10);
        $this->parent = Category::where('parent_id', 0)->orderBy('name')->pluck('name', 'id')->toArray();
        $parent = $this->parent;
        return view('livewire.admin.categories', compact('data', 'parent'));
    }
}