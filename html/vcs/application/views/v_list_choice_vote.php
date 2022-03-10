<div class="container" style="margin-top: 30px;">
    <div class="row">
        <?php for($i = 0; $i < count($arr_choice_vote); $i++){?>
            <div class="card col-lg-3 col-sm-6" style="margin:20px 30px;">
                <img src="<?= base_url().'images/image_vote.jpg'?>" class="card-img-top">
                <div class="card-body">
                    <center><?= $arr_choice_vote[$i]->cho_name?></center><br>
                    <button class="btn btn-info" style="width: 100%;" onclick="vote_modal(<?= $arr_choice_vote[$i]->cho_id?>, '<?= $arr_choice_vote[$i]->cho_name?>')">โหวต</button>
                </div>
                <input type="hidden" value="<?= $arr_choice_vote[$i]->cho_score?>" id="score_<?= $arr_choice_vote[$i]->cho_id?>">
            </div>
        <?php }?>
    </div>
</div>


<!-- vote modal -->
<div class="modal" tabindex="-1" id="modal_vote">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="name_vote"></h5>
      </div>
      <div class="modal-body">
        <input class="form-control" type="number" id="score_vote" placeholder="กรอกคะแนน">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button id="submit" class="btn btn-success" disabled>ยืนยัน</button>
      </div>
    </div>
  </div>
</div>

<script>
    /*
    * vote_modal
    * show modal vote
    * @input id, name
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-10
    * @Update Date -
    */
    function vote_modal(id, name){
        console.log(id + ': ' + name);
        $('#name_vote').html(name);
        $('#modal_vote').modal();

        $('#score_vote').keydown(function() {
          var score = $('#score_vote').val();
          if(score > 0){
            $('#submit').prop('disabled', false);
          } else {
            $('#submit').prop('disabled', true);
          }
        });
        
        $('#submit').click(function() {
          vote_ajax(id, $('#score_vote').val());
        });
    }

    /*
    * vote_ajax
    * vote 
    * @input id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-10
    * @Update Date -
    */
    function vote_ajax(id, score){
      var cho_score = $('#score_'+id).val();
      console.log(cho_score + ':' + id + ':' + score);

      $.ajax({
          url: "<?php echo base_url() . "User/vote_ajax/"?>",
          method: "POST",
          dataType: "JSON",
          data: {
            cho_id: id,
            cho_score: cho_score,
            score_vote: score,
          },
          success: function(){
            location.reload();
          }
      });
    }
</script>