<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoriesChild extends Component
{

    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];
    public $item;
    public $primaryKey;

    public function rules(){
        return [
            'item.name' => 'required',
            'item.slug' => ['required', Rule::unique('product_categories', 'slug')->ignore($this->primaryKey)],
            'item.parent_id' => 'required',
            'item.is_active' => 'boolean',
        ];
    }

    protected $validationAttributes = [
        'item.name' => 'Name',
        'item.slug' => 'Slug',
        'item.parent_id' => 'Category',
        'item.is_active' => 'Is Active',
    ];

    public function render()
    {
        return view('livewire.admin.categories-child', [
            'categories'=>$this->getCategories()
        ]);
    }

    public function updated($name, $value)
    {
        if($name == 'item.name')
        {
            $this->item['slug']=Str::slug($value);
        }
    }

    public function showDeleteForm($id)
    {
        $this->primaryKey = $id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'delModal', 'action'=>'show']);
    }

    public function deleteItem()
    {
        ProductCategory::destroy($this->primaryKey);
        $this->dispatchBrowserEvent('modal', ['modal'=>'delModal', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        $this->emitTo('categories', 'refresh');
    }

    public function showCreateForm()
    {
        $this->dispatchBrowserEvent('modal', ['modal'=>'addModal', 'action'=>'show']);
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem()
    {
        $this->validate();
        ProductCategory::create([
            'name' => $this->item['name'],
            'parent_id' => $this->item['parent_id'],
            'slug' => $this->item['slug'],
            'is_active' => $this->item['is_active'],
        ]);
        $this->dispatchBrowserEvent('modal', ['modal'=>'addModal', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Created']);
        $this->emitTo('admin.categories', 'refresh');
    }

    public function showEditForm(ProductCategory $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->primaryKey = $item->id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'editModal', 'action'=>'show']);
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->dispatchBrowserEvent('modal', ['modal'=>'editModal', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
        $this->emitTo('admin.categories', 'refresh');
    }
    public function getCategories()
    {
        return ProductCategory::orderBy('parent_id')->orderBy('name')->get();
    }
}
