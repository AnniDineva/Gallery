  <!-- Modal -->
  <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserLabel" class="text-center text-danger">Are you want to delete this user?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('user_destroy')}}" method="post" id="removeForm">
            <div class="modal-footer">
                @csrf
                
                <input type="hidden" value="" class="userId" name="id"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger ">Yes, delete user</button>
            </div>
        </form>
      </div>
    </div>
  </div>