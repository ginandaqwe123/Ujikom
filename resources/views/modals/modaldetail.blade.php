<div id="detailModal{{ $post->id }}" class="modal fade" role="dialog" >
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <img src="{{ ('storage/') . $post->image }}" class="img-fluid">
            <h5 class="card-text mt-3">{{ $post->JudulFoto }}</h5>  
              <p><small class="text-muted card-text">{{ $post->DeskripsiFoto }}</small></p> 
            <form action="">
              @csrf
              <div>
                <input type="text" name="JudulFoto" class="form-control mt-3" placeholder="Tambahkan Komentar">
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>