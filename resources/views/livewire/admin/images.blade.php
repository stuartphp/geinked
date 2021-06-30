<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                <div class="row">
                <div class="col-sm-6">Images </div>
                <div class="col-sm-6">
                <select wire:model="folder" class="form-select form-select-sm">
                <option value="">Select</option>
                @for ($i=0; count($folders) > $i; $i++)
                    <option value="{{ $i }}">{{ $folders[$i] }}</option>
                @endfor
                </select></div>
                </div>
                </div>
                <div class="col-md-4">
                    <form wire:submit.prevent="save" class="row row-cols-lg-auto g-2 align-items-center">
                        <div class="col-12">
                            <input type="file" wire:model="photo" class="form-control form-control-sm">
                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit">Save Photo</button>
                        </div>

                    </form>
                </div>
            </div>
            </div>
        <div class="card-body"><div class="row">
        @foreach ($images as $image )
        <div class="col-sm-3 mb-2">
            <button type="button" class="btn btn-outline-secondary btn-sm" wire:click.prevent="showImage('{{ $image->path }}')">{{ $image->name }}</button>
        </div>
        @endforeach
       
    </div></div>

    </div>


    <div class="modal" id="imageModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">{{ $image['folder'].'/'.$image['name'] }}</h6>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><br><small>{{ $detail }}</small><br>
              <img src="/{{ $showImg }}" style="max-width: 450px !important"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div>
      </div>

</div>
