<div class="container" style="margin-top: 30px;">
  <?php if ($this->session->userdata("use_status") == 2){?>
    <button type="button" class="btn btn-info" style="float: right;" data-toggle="modal" data-target="#myModal">เพิ่มตัวเลือกการโหวต</button><br>
  <?php }?>
  <div class="row">
    <?php for ($i = 0; $i < count($arr_choice_vote); $i++) { ?>
      <div class="card col-lg-3 col-sm-6" style="margin:20px 30px;">
        <img src="<?= base_url() . 'images/image_vote.jpg' ?>" class="card-img-top">
        <div class="card-body">
          <center><?= $arr_choice_vote[$i]->cho_name ?></center><br>
          <button class="btn btn-info" style="width: 100%;" onclick="vote_modal(<?= $arr_choice_vote[$i]->cho_id ?>, '<?= $arr_choice_vote[$i]->cho_name ?>')">โหวต</button>
        </div>
        <input type="hidden" value="<?= $arr_choice_vote[$i]->cho_score ?>" id="score_<?= $arr_choice_vote[$i]->cho_id ?>">
      </div>
    <?php } ?>
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

<!-- Modal Add Choice Vote-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ใส่ข้อมูลตัวเลือกการโหวต</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- ปุ่มปิด -->
            </div>
            <!-- ส่วนหัว -->

            <form method='POST' action='<?php echo base_url('User/add_choice_vote') ?>'>
                <div class="modal-body">
                    <div class="container">
                        <div class="row py-2">
                            <label class="low-lebel">ชื่อตัวเลือกโหวต</label>
                            <input type="text" class="form-control" id="cho_name" name="cho_name" placeholder="ใส่ชื่อตัวเลือกโหวต">
                        </div>
                        <!-- ชื่อตัวเลือกโหวต -->

                        <div class="row py-2">
                            <label class="low-lebel">คะแนน</label>
                            <input type="text" class="form-control" id="cho_score" name="cho_score" placeholder="ใส่คะแนน">
                        </div>
                        <!-- คะแนน -->
                        <input type="hidden" class="form-control" id="vot_id" name="vot_id" value="<?= $vot_id?>">

                    </div>
                </div>
                <!-- ส่วนตัว -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
                <!-- ส่วนหาง -->
            </form>
            <!-- Form -->
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
  function vote_modal(id, name) {
    // console.log(id + ': ' + name);
    $('#name_vote').html(name);
    $('#modal_vote').modal();

    $('#score_vote').blur(function() {
      var score = $('#score_vote').val();
      if (score > 0 && score <= <?= $this->session->userdata("use_point")?>) {
        console.log(1);
        $('#submit').prop('disabled', false);
      }else if(score <= 0) {
        console.log(2);
        $('#submit').prop('disabled', true);
        $('#score_vote').val('');
      }else if(score > <?= $this->session->userdata("use_point")?>){
        console.log(3);
        $('#submit').prop('disabled', true);
        $('#score_vote').val(<?= $this->session->userdata("use_point")?>);
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
  function vote_ajax(id, score) {
    var cho_score = $('#score_' + id).val();
    $('#submit').prop('disabled', true);
    // console.log(cho_score + ':' + id + ':' + score);
    $('#score_vote').val('');

    $.ajax({
      url: "<?php echo base_url() . "User/vote_ajax/" ?>",
      method: "POST",
      dataType: "JSON",
      data: {
        cho_id: id,
        cho_score: cho_score,
        score_vote: score
      },
      success: function(data) {
        swal("สำเร็จ", "คุณได้ทำการโหวตเสร็จสิ้น", "success").then(function(){
          location.reload();
        });
      },
      error: function() {
        alert('ajax error working');
      }
    });
  }
    /*
     * delete_choice_vote_ajax
     * delete choice vote
     * @input cho_id
     * @output choice vote deleted
     * @author Thanisorn thumsawanit 62160088
     * @Create Date 2565-03-12
     */
    function delete_choice_vote_ajax(cho_id) {
        console.log(cho_id);
        $.ajax({
            type: "POST",
            data: {
              cho_id: cho_id
            },
            url: '<?php echo site_url() . 'User/delete_choice_vote_ajax/' ?>',
            success: function() {
                swal({
                        title: "ลบตัวเลือกการโหวต",
                        text: "ลบตัวเลือกการโหวตเสร็จสิ้น",
                        type: "success"
                    },
                    function() {
                        location.reload();
                    })

            },
            error: function() {
                alert('ajax error working');
            }
        });
    }
</script>