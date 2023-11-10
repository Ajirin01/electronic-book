<div class="modal fade" id="pdfModal<?=$contentId?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$contentTitle?> (Preview)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body" class="modal-body">
        <div id="pdfViewer<?=$contentId?>">
        <div style="height: 100px; width: 100%; text-align: center">
            <h3 style="margin-top: 30px">Please wait, content loading...</h3>
        </div>
        </div>
        <div>
          <button id="prevPage<?=$contentId?>">Previous Page</button>
          <span id="currentPage<?=$contentId?>"></span>
          <button id="nextPage<?=$contentId?>">Next Page</button>
          <input type="number" id="pageNumberInput<?=$contentId?>" placeholder="Go to Page">
          <button id="goToPageButton<?=$contentId?>">Go</button>
          <button id="downloadButton<?=$contentId?>">Download PDF</button> <!-- Add this button -->
        </div>
      </div>
    </div>
  </div>
</div>