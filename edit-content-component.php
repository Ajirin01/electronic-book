<div class="modal fade" id="contentEditModal<?=$content['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12 mr-auto">
                    <form id="editContentForm<?=$content['id']?>" enctype="multipart/form-data" onsubmit="updateContent(<?=$content['id']?>)">
                        <div class="contact_form-container">
                            <div class="row">
                                <div class="col-12">
                                    <input id="title" name="title" value="<?=$content['title']?>" class="form-control" type="text" placeholder="Title">
                                </div>

                                <div class="col-12" style="margin-top: 5px">
                                    <input id="subtitle" name="subtitle" value="<?=$content['subtitle']?>" class="form-control" type="text" placeholder="Add Subtitle">
                                </div>

                                <div class="col-12" style="margin-top: 5px">
                                    <textarea name="description" value="<?=$content['title']?>" id="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>

                                <div class="col-12" style="margin-top: 5px">
                                    <input type="file" name="content_file" value="<?=$content['content_file']?>" id="content_file" class="form-control" accept=".pdf">
                                </div>

                                <div class="mt-5">
                                    <button type="update">
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