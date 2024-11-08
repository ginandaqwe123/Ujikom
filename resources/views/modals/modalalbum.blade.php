<div id="ModalAlbum" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header text-center text-dark">
          <h4 class="modal-title">New Album</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('album.store') }}" method="POST">
              @csrf
                <div class="form-group">
                    <input type="text" name="NamaAlbum" class="form-control mt-3 @error('NamaAlbum')
                is-invalid @enderror" placeholder="Title Photo" autofocus value="{{ old('NamaAlbum') }}">
                @error('NamaAlbum')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                        
                @enderror
                </div>
                <div class="form-group">
                    <textarea name="Deskripsi" class="form-control my-3 @error('Deskripsi')
                is-invalid @enderror" placeholder="Description" autofocus value="{{ old('Deskripsi') }}"></textarea>
                @error('Deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>                        
                @enderror
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-info" type="submit">Save</button>
                  </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>