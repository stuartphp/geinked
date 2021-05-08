<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Images ({{ $folder }})</div>
                <div class="col-md-6">
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
        @for ($i=0; $i<count($images); $i++ )
            <div class="col-sm-3 mb-2">
                @if($images[$i][0] == '/')
                <button type="button" class="btn btn-primary btn-sm" wire:click="updFolder('images{{ $images[$i] }}')">{{ $images[$i] }}

                </button>
                @else
                <button type="button" class="btn btn-outline-secondary btn-sm" wire:click.prevent="showImage('{{ $images[$i] }}')">{{ $images[$i] }}

                </button>
                @endif
            </div>
        @endfor
    </div></div>

    </div>


    <div class="modal" id="imageModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">/images/{{ $image }}</h6>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><br><small>{{ $detail }}</small><br>
              <img src="/{{ $folder }}/{{ $image }}" style="max-width: 450px !important"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm">Delete</button>
            </div>
          </div>
        </div>
      </div>

</div>
