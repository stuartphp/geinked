<div>
    <div class="mb-3">
        <label>Model Path</label>
        <input type="text" class="form-control form-control-sm @error('modelPath') is-invalid @enderror" wire:model.defer="modelPath"/>
        @error('modelPath')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if (!$isValidModel)
            <button class="btn btn-primary btn-sm" wire:click="checkModel">Check</button>
        @endif
    </div>
    @if ($isValidModel)
        <div>
            <div class="text-black">Table Name is: <span class="font-bold"> {{$modelProps['table_name']}}</span></div>
            <div class="text-black">Primary Key is: <span class="font-bold"> {{$modelProps['primary_key']}}</span></div>
        </div>
        <h4>Primary Key Features</h4>

    @endif
</div>
