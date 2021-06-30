<?php

namespace App\Http\Livewire\Admin;

use Exception;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use App\Http\Livewire\Traits\WithHelpers;
use App\Http\Livewire\Traits\WithBaseHtml;
use App\Http\Livewire\Traits\WithComponentCode;
use App\Http\Livewire\Traits\WithFeatures;
use App\Http\Livewire\Traits\WithTemplates;
use App\Http\Livewire\Traits\WithViewCode;

class Crud extends Component
{
    use WithHelpers;
    use WithBaseHtml;
    use WithComponentCode;
    use WithFeatures;
    use WithTemplates;
    use WithViewCode;

    public $exitCode;
    public $isComplete = false;
    public $generatedCode;
    public $modelPath='';
    public $modelProps = [];
    public $isValidModel = false;
    public $advancedSettings = [
        'title' => '',
        'text' => [
            'add_link' => 'Create New',
            'edit_link' => 'Edit',
            'delete_link' => 'Delete',
            'create_button' => 'Save',
            'edit_button' => 'Save',
            'cancel_button' => 'Cancel',
            'delete_button' => 'Delete',
        ],
    ];
    public $showAdvanced = false;

    protected $rules = [
        'modelPath' => 'required',
        'componentName' => 'required|alpha_dash|min:3',
    ];
    public $fields = [];
    public $attributeKey;
    public $confirmingAttributes = false;
    public $attributes = [
        'rules' => '',
        'type' => 'input',
        'options' => ''
    ];

    public $componentName = '';
    public $componentProps = [
        'create_add_modal' => true,
        'create_edit_modal' => true,
        'create_delete_button' => true,
    ];

    public $primaryKeyProps = [
        'in_list' => true,
        'label' => '',
        'sortable' => true,
    ];
    protected $messages = [
        'modelPath.required' => 'Please enter Path to your Model',
        'componentName.required' => 'Please enter the name of your component',
        'componentName.alpha_dash' => 'Only alphanumeric, dashes and underscore are allowed',
        'componentName.min' => 'Must be minimum of 3 characters',
    ];

    public function render()
    {
        return view('livewire.admin.crud');
    }
    public function checkModel()
    {
        $this->validateOnly('modelPath');

        //check class exists
        $this->resetValidation();
        if (!class_exists($this->modelPath)) {
            $this->addError('modelPath', 'File does not exists');
            return;
        }

        try {
            $model = new $this->modelPath();
            $this->modelProps['table_name'] = $model->getTable();
            $this->modelProps['primary_key'] = $model->getKeyName();
            $this->modelProps['columns'] = $this->_getColumns(Schema::getColumnListing($model->getTable()), $this->modelProps['primary_key']);
        } catch (Exception $e) {
            $this->addError('modelPath', 'Not a Valid Model Class.');
            return;
        }

        $this->isValidModel = true;
        $this->advancedSettings['title'] = Str::title($this->modelProps['table_name']);
    }


}
