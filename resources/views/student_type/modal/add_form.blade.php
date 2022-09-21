
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="studentTypeAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Student Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
             <form action="{{ route('student.type.store') }}" method="post" id="studentTypeStore">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="classId" class="col-form-label col-sm-3 text-right">
                                Class Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="class_id" id="classId" required autofocus>
                                    <option style="display: none">---Select Class---</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="studentType" class="col-form-label col-sm-3 text-right">
                                    Student Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="student_type" value="{{ old('student_type') }}"
                                        id="student_type" placeholder="Write student type here">
                                </div>
                            </div>
                    </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" id="reset">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->
