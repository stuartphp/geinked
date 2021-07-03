<div class="mt-3">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="row mb-2">
                <label class="col-md-3">Code</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.code"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Category</label>
                <div class="col-md-9">
                    <select class="form-select form-select-sm" wire:model.defer="stage.category_id">
                        <option value="">{{ __('Please Select') }}</option>
                        <option value="0" class="optionGroup">{{ __('Main Category') }}</option>
                        @foreach ($categories as $cat)
                            @if ($cat->parent_id==0)
                                <option value="{{ $cat->id }}" class="optionGroup">{{ $cat->name }}</option>
                                @foreach ($categories as $sub )
                                    @if ($sub->parent_id == $cat->id)
                                        <option value="{{ $sub->id }}">&nbsp;&nbsp;&nbsp;{{ $sub->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Unit</label>
                <div class="col-md-9">
                    <select class="form-select form-select-sm" wire:model.defer="stage.unit_id">
                        <option value="">{{ __('Please Select') }}</option>
                        @foreach ($units as $k=>$v )
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Cost</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.cost"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">On hand</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.on_hand"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Min Order Qyantity</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.min_order_quantity"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Viewed</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.viewed"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Is Service</label>
                <div class="col-md-9">
                    <div class="form-check">
                        <input class="form-check-input" wire:model.defer="stage.is_service" type="checkbox">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Is Feature</label>
                <div class="col-md-9">
                    <div class="form-check">
                        <input class="form-check-input" wire:model.defer="stage.is_feature" type="checkbox">
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Is Active</label>
                <div class="col-md-9">
                    <div class="form-check">
                        <input class="form-check-input" wire:model.defer="stage.is_active" type="checkbox">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row mb-2">
                <label class="col-md-3">Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="stage.name"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Slug</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.slug"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Keywords</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.keywords"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Short Description</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm" wire:model.defer="stage.short_description"/>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-3">Description</label>
                <div class="col-md-9">
                    <textarea class="form-control form-control-sm" wire:model.defer="stage.description"></textarea>
                </div>
            </div>
        </div>
    </div>


</div>
