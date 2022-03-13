<div class="container" style="margin-top: 10px;">
    <div class="row" style="padding: 15px;">
        <?php if ($this->session->userdata("use_status") == 2) { ?>
            <button class="btn btn-info" onclick="show_modal_add_vote()">เพิ่มโหวต</button><br>
        <?php } ?>
    </div>
    <div class="row">
        <?php for ($i = 0; $i < count($arr_vote); $i++) { ?>
            <div class="card col-lg-4 col-sm-8 col-md-10 col-12" style="margin:20px 30px;">
                <img src="<?= base_url() . '/images/image_vote.jpg' ?>" class="card-img-top">
                <div class="card-body">
                    <center>
                        <h5><?php echo $arr_vote[$i]->vot_name ?></h5>
                        <hr width="100%">
                    </center>
                    <p>
                        <?php echo 'เริ่ม ' . to_format_abbreviation(explode(" ", $arr_vote[$i]->vot_start_time)[0]) . ' เวลา ' . substr(explode(" ", $arr_vote[$i]->vot_start_time)[1], 0, 5) ?>
                    </p>
                    <p>
                        <?php echo 'สิ้นสุด ' . to_format_abbreviation(explode(" ", $arr_vote[$i]->vot_end_time)[0]) . ' เวลา ' . substr(explode(" ", $arr_vote[$i]->vot_end_time)[1], 0, 5) ?>
                    </p>
                    <a href="<?= base_url() . 'User/show_choice_vote_list/' . $arr_vote[$i]->vot_id; ?>" class="btn btn-info" style="width: 100%;">เลือก</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- modal add vote -->
<div class="modal" tabindex="-1" id="modal_add_vote">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มโหวต</h5>
            </div>
            <form action="<?php echo base_url() . "User/add_vote/"?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="image"></div>
                    <div class="form-group">
                        <label for="name">ชื่อโหวต</label>
                        <input class="form-control" type="text" id="name" placeholder="กรอกชื่อโหวต">
                    </div>
                    <div class="form-group">
                        <label for="start_vote">วันที่เริ่มโหวต</label>
                        <input class="form-control" type="datetime-local" id="start_vote">
                    </div>
                    <div class="form-group">
                        <label for="end_vote">วันที่สิ้นสุดโหวต</label>
                        <input class="form-control" type="datetime-local" id="end_vote">
                    </div>
                    <div class="form-group">
                        <label for="vot_path">รูปภาพ</label><br>
                        <input type="file" id="vot_path" hidden>
                        <a class="btn btn-primary" onclick="document.getElementById('vot_path').click();">อัปโหลด</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" id="submit" class="btn btn-success">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    /*  
     * show_modal_add_vote
     * show modal add vote
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-12
     * @Update -
     */
    function show_modal_add_vote() {
        $('#modal_add_vote').modal();

        // $('#submit').click(function() {
        //     add_vote_ajax();
        // });
    }

    /*  
     * add_vote_ajax
     * add vote 
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-12
     * @Update -
     */
    function add_vote_ajax() {
        var name = $('#name').val();
        var start_time = $('#start_vote').val();
        var end_time = $('#end_time').val();
        
        $.ajax({
            url: "<?php echo base_url() . "User/add_vote_ajax/" ?>",
            method: "POST",
            dataType: "JSON",
            data: {
                vot_name: name,
                vot_start_time: start_time,
                vot_end_time: end_time
            },
            success: function(data) {
                swal("สำเร็จ", "คุณได้ทำการเพิ่มโหวตเสร็จสิ้น", "success").then(function(){
                location.reload();
                });
            },
            error: function() {
                alert('ajax error working');
            }
        });
    }
</script>