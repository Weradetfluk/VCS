<style>
    .div-span-image{
        position: relative;
        height: 40px;
        margin-top: -40px;
        background: rgba(0, 0, 0, 0.5);
        text-align: center;
        line-height: 40px;
        font-size: 13px;
        color: #f5f5f5;
        font-weight: 600;
    }
</style>
<div class="container" style="margin-top: 10px;">
    <div class="row" style="padding: 15px;">
        <?php if ($this->session->userdata("use_status") == 2) { ?>
            <button class="btn btn-info" onclick="show_modal_add_vote()">เพิ่มโหวต</button><br>
        <?php } ?>
    </div>
    <div class="row">
        <?php for ($i = 0; $i < count($arr_vote); $i++) { ?>
            <div class="card col-lg-4 col-sm-8 col-md-10 col-12" style="margin:20px 30px;">
                <div class="container" style="width: 200px;">
                    <img src="<?= base_url() . 'image_vote/'. $arr_vote[$i]->vot_path?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: contain;">
                </div>
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
            <form action="<?php echo base_url() . "User/add_vote/" ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row" style="text-align: center; background-color: #F1F2F1;">
                        <div class="container" style="width: 300px; height:auto;">
                            <label for="vot_path" style="margin-top: 10px;">
                                <img src="https://bit.ly/3ubuq5o" alt="" style="width: 100%; height: 200px; object-fit: cover;" id="image_vote">
                                <div class="div-span-image">
                                    <span style="font-size: 25px;" id="name_image">+</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">ชื่อโหวต</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="กรอกชื่อโหวต">
                        </div>
                        <div class="form-group col-12">
                            <label for="start_vote">วันที่เริ่มโหวต</label>
                            <input class="form-control" type="datetime-local" id="start_vote" name="start_vote">
                        </div>
                        <div class="form-group col-12">
                            <label for="end_vote">วันที่สิ้นสุดโหวต</label>
                            <input class="form-control" type="datetime-local" id="end_vote" name="end_vote">
                        </div>
                        <div class="form-group col-12">
                            <input type="file" name="vot_path" id="vot_path" accept="image/*" hidden>
                        </div>
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
    $( document ).ready(function() {
        let error_add = '<?= $this->session->userdata("error_image"); ?>';
        if (error_add == "success") {
            <?= $this->session->unset_userdata("error_image"); ?>
            swal("สำเร็จ", "เพิ่มโหวตสำเร็จ", "success");
        }else if (error_add == "fail"){
            <?= $this->session->unset_userdata("error_image"); ?>
            swal("ไม่สำเร็จ", "เพิ่มโหวตไม่สำเร็จ", "error");
        }
        preview_image();
    });

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
    }

    /*  
     * preview_image
     * preview image
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-14
     * @Update -
     */
    function preview_image(){
        document.querySelector("#vot_path").addEventListener("change",function(e){
            if(e.target.files.length == 0){
                document.querySelector(".div-span-image").style.display = "block";
                document.querySelector("#image_vote").src = 'https://bit.ly/3ubuq5o';
                return;
            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector(".div-span-image").style.display = "none";
            document.querySelector("#image_vote").src = url;
        });
    }
</script>