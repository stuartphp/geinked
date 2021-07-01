<div>
    <div class="modal" tabindex="-1" id="addModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-lg">
                    <i class="fa fa-save text-default"></i>&nbsp;Create new Record
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="control-label col-4">Name</label>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" wire:model="item.name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-4">Slug</label>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" wire:model.defer="item.slug" required>
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="parent_id" class="col-4">Category</label>
                        <div class="col-8">
                            <select wire:model.defer="item.parent_id" class="form-select form-select-sm">
                                <option value="">{{ __('Please Select') }}</option>
                                <option value="0">{{ __('Main Category') }}</option>
                                @foreach ($categories as $cat)
                                    @if ($cat->parent_id==0)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @foreach ($categories as $sub )
                                            @if ($sub->parent_id == $cat->id)
                                                <option value="{{ $sub->id }}">- {{ $sub->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                            @error('item.name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-4">Image</label>
                        <div class="col-8">
                            <input type="file" class="form-control form-control-sm" wire:model.defer="item.image" autofocus>
                            @error('item.image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="is_active" class="col-4">Is Active</label>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" wire:model.defer="item.is_active" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm" wire:click="createItem()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="editModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-lg">
                    <i class="fa fa-edit text-default"></i>&nbsp;Update
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="control-label col-4">Name</label>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" wire:model.defer="item.name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-4">Slug</label>
                        <div class="col-8">
                            <input type="text" class="form-control form-control-sm" wire:model.defer="item.slug" required>
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="parent_id" class="col-4">Category</label>
                        <div class="col-8">
                            <select wire:model.defer="item.parent_id" class="form-select form-select-sm">
                                <option value="">{{ __('Please Select') }}</option>
                                <option value="0">{{ __('Main Category') }}</option>
                                @foreach ($categories as $cat)
                                    @if ($cat->parent_id==0)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @foreach ($categories as $sub )
                                            @if ($sub->parent_id == $cat->id)
                                                <option value="{{ $sub->id }}">- {{ $sub->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                            @error('item.name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-4">Image</label>
                        <div class="col-8">
                            <input type="file" class="form-control form-control-sm" wire:model.defer="item.image" autofocus>
                            @error('item.image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="is_active" class="col-4">Is Active</label>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" wire:model.defer="item.is_active" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning btn-sm" wire:click="editItem()">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="delModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-lg">
                    <i class="fa fa-warning text-danger"></i>&nbsp;Delete
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="deleteItem()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
