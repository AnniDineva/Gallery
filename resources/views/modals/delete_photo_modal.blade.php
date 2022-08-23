<!-- Modal -->
 <div class="modal fade" id="deletePhoto" tabindex="-1" aria-labelledby="deletePhotoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletePhotoLabel" class="text-center text-danger">Are you want to delete this photo?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('photo_destroy')}}" method="post" id="removePhotoForm">
            <div class="modal-footer">
                @csrf
                
                <input type="hidden" value="" class="photoId" name="id"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger ">Yes, delete photo</button>
            </div>
        </form>
      </div>
    </div>
  </div>
