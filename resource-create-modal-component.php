<div class="modal fade" id="resourceCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Resource</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12 mr-auto">
                  <form id="createresourceForm" enctype="multipart/form-data">
                    <div class="contact_form-container">
                      <div class="row">
                        <div class="col-12">
                          <input id="name" name="name" class="form-control" type="text" placeholder="Title">
                        </div>

                        <div class="col-12" style="margin-top: 5px">
                          <input type="file" name="resource_file" id="resource_file" class="form-control">
                        </div>

                        <div class="mt-5">
                          <button type="submit" onclick="uploadResource()">
                            Submit
                          </button>
                        </div>
                      </div>

                    </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>