<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">Categories &nbsp;&nbsp;<a href="#" wire:click.prevent="categoryAction('add', 0)"><i class="fa fa-plus mt-2"></i></a></div>
                <div class="col-2">
                    <input class="form-control me-2 form-control-sm" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr><th>ID</th>
                        <th>Name</th>
                        <th>Parent Id</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->parent_id }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>@if ($item->image>'')
                          <img src="/images/{{ $item->image}}" style="height: 75px;"/>
                          @else
                          No Image
                        @endif
                      </td>
                        <td>{{ ($item->is_active==1) ? 'Yes':'No' }}</td>
                        <td><select class="form-select  form-select-sm" wire:change='categoryAction($event.target.value, {{ $item->id }})'>
                            <option value="">-- Select --</option>
                            <option value="edit">Edit</option>
                            <option value="delete">Delete</option>
                            </select></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="modal-footer">
            {{ $data->links() }}
        </div>
    </div>
    <div class="modal" tabindex="-1" id="categoryModal" wire:ignore.self>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Category: {{ $modal_title }}</h5>
              <i class="fa fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body">
              <div class="row mb-3">
                <label class="col-4">Name</label>
                <div class="col-8">
                    <input type="text" wire:model="name" class="form-control form-control-sm"/>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-4">Parent</label>
                <div class="col-8">
                    <select class="form-select form-select-sm" wire:model="parent_id">
                        <option value="0">* Is Parent</option>
                        @foreach ($parent as $k=>$v )
                        <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-4">Is Active</label>
                <div class="col-8">
                    <select class="form-select form-select-sm" wire:model="is_active">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-4">Slug</label>
                <div class="col-8">
                    <input type="text" wire:model="slug" class="form-control form-control-sm"/>
                    @error('slug') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-4">Image</label>
                <div class="col-8">
                    <input type="text" wire:model="image" class="form-control form-control-sm"/>
                    @error('image') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm" wire:click="categoryCrud">{{ $modal_btn }}</button>
            </div>
          </div>
        </div>
      </div>

</div>
