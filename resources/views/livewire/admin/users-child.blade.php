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
                        <label class="control-label col-md-4">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-sm" wire:model.defer="item.name"/>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-sm" wire:model.defer="item.email"/>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-md-4">Mobile</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-sm" wire:model.defer="item.mobile"/>
                        </div>
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="is_admin" class="col-4">Is Admin</label>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" wire:model.defer="item.is_admin" type="checkbox">
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
                        <label class="control-label col-md-4">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-sm" wire:model.defer="item.name"/>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-sm" wire:model.defer="item.email"/>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="control-label col-md-4">Mobile</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control form-control-sm" wire:model.defer="item.mobile"/>
                        </div>
                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="is_admin" class="col-4">Is Admin</label>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" wire:model.defer="item.is_admin" type="checkbox">
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
