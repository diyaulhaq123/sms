<!-- Lesson Plan update/edit 2 -->
<div class="modal fade" id="smallModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel22">Update Lesson Plan </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <form action="" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="" id="lesson_plan"></div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>