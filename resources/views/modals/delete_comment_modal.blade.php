<!-- Modal -->
<div class="modal fade" id="deleteComment" tabindex="-1" aria-labelledby="deleteCommentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteComment" class="text-center text-danger">Are you want to delete this comment?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('comment_destroy')}}" method="post" id="removeCommentForm">
            <div class="modal-footer">
                @csrf
                
                <input type="hidden" value="" class="commentId" name="id"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger ">Yes, delete comment</button>
            </div>
        </form>
      </div>
    </div>
  </div>
