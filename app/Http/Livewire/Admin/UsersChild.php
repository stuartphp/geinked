<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UsersChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];

    public $item;

    protected $rules = [
        'item.name' => 'required',
        'item.email' => 'required|unique:users.email',
        'item.mobile' => 'required',
        'item.is_admin' => 'boolean',
    ];

    protected $validationAttributes = [
        'item.name' => 'Name',
    ];

    public function render()
    {
        return view('livewire.admin.users-child');
    }

    public $primaryKey;

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
        $this->dispatchBrowserEvent('modal', ['modal'=>'delModal', 'action'=>'show']);
    }

    public function deleteItem()
    {
        User::destroy($this->primaryKey);
        $this->dispatchBrowserEvent('modal', ['modal'=>'delModal', 'action'=>'hide']);
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
        $this->emitTo('product-units', 'refresh');
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
        User::create([
            'name' => $this->item['name'],
        ]);
        $this->dispatchBrowserEvent('modal', ['modal'=>'addModal', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Created']);
        $this->emitTo('product-units', 'refresh');
    }

    public function showEditForm(User $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->dispatchBrowserEvent('modal', ['modal'=>'editModal', 'action'=>'show']);
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->dispatchBrowserEvent('modal', ['modal'=>'editModal', 'action'=>'hide']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Updated']);
        $this->primaryKey = '';
        $this->emitTo('product-units', 'refresh');
    }
}
