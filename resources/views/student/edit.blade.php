  <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="studentBasicInfoUpdate" tabindex="-1" role="dialog" aria-labelledby="studentBasicInfoUpdate"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentBasicInfoUpdate">Student Basic Info Update Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
             <form action="#" method="post" id="studentTypeUpdate">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                                <label for="studentType" class="col-form-label col-sm-3 text-right">
                                    Student Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="student_type"
                                        id="student_type" placeholder="Write student type here">
                                </div>
                            </div>
                            <input type="hidden" name="type_id" id="typeId">
                    </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary d-none" id="reset">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->
