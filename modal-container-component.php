<div class="container modals-container">
    <div class="modal fade" id="constantsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Scientific Constants</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <iframe src="https://chem.libretexts.org/Bookshelves/Ancillary_Materials/Reference/Units_and_Conversions/Physical_Constants?adaptView" width="100%" height="400px" loading="lazy"></iframe>
              </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="calculatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scientific Calculator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.desmos.com/scientific"width="100%" height="250" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="contentMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Resources</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <?php
                        foreach ($resources as $resource){
                                $resourceId = $resource['id'];
                                $resourceTitle = $resource['name']; ?>
                               <li> <a href='resources/<?=$resource['path']?>' download> <?= $resourceTitle?> </a> <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === "admin"){ ?> <i onclick="deleteResource('<?= $resourceId?>', '../resources/<?=$resource['path']?>')" class="fa fa-trash"></i> <?php } ?> </li>
                        <?php }   
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>