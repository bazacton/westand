<?php
//require_once '../../../../wp-load.php';
	$video = $_REQUEST['post_video'];
	$poster = $_REQUEST['poster'];
?>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header post-modal">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <video width="100%" height="360" poster="<?php echo cs_allow_special_char($poster);?>">
                <source src="<?php echo cs_allow_special_char($video);?>" type="video/mp4" title="mp4">
        </video>
        
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
