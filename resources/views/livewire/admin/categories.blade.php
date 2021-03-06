<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-start">
                <div class="col-9 text-lg">Categories</div>
                <div class="col-1 text-end"><a href="#" wire:click="$emitTo('admin.categories-child', 'showCreateForm');"><i class="fa fa-plus mt-2"></i></a></div>
                <div class="col-2"><input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th wire:click="sortBy('name')" class="pointer"><x-sort-icon sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" /> Name</th>
                        <th wire:click="sortBy('parent_id')" class="pointer"><x-sort-icon sortField="parent_id" :sort-by="$sortBy" :sort-asc="$sortAsc" /> Parent Id</th>
                        <th wire:click="sortBy('Slug')" class="pointer"><x-sort-icon sortField="Slug" :sort-by="$sortBy" :sort-asc="$sortAsc" /> Slug</th>
                        <th>Is Active</th>
                        <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result->name }}</td>
                            <td>{{ ($result->parent_id>0) ? $categories[$result->parent_id]: '' }}</td>
                            <td>{{ $result->slug }}</td>
                            <td>{{ ($result->is_active==1) ? 'Yes' : 'No' }}</td>
                            <td class="text-end">
                                <a href="#" title="Edit" wire:click="$emitTo('admin.categories-child', 'showEditForm',  {{ $result->id}});"><i class="fa fa-edit text-lg text-default px-2"></i></a>
                                <a href="#" title="Delete" wire:click="$emitTo('admin.categories-child', 'showDeleteForm',  {{ $result->id}});"><i class="fa fa-trash text-lg text-danger px-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $results->links() }}
        </div>
    </div>
    @livewire('admin.categories-child')

</div>
