<div class="modal fade" id="pdfModal<?=$content->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$content->title?> (Preview)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body" class="modal-body">
        <div id="pdfViewer<?=$content->id?>"></div>
        <div>
          <button id="prevPage<?=$content->id?>">Previous Page</button>
          <span id="currentPage<?=$content->id?>"></span>
          <button id="nextPage<?=$content->id?>">Next Page</button>
          <input type="number" id="pageNumberInput<?=$content->id?>" placeholder="Go to Page">
          <button id="goToPageButton<?=$content->id?>">Go</button>
          <button id="downloadButton<?=$content->id?>">Download PDF</button> <!-- Add this button -->
        </div>
      </div>
    </div>
  </div>
</div>