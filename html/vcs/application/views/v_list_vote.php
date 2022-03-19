<style>
    .div-span-image {
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
    <?php if ($this->session->userdata("use_status") == 2) { ?>
        <button type="button" class="btn btn-info" style="float: right;" onclick="show_modal_add_vote()">เพิ่มโหวต</button><br>
    <?php } ?>

</div>
<div class="row">
    <?php for ($i = 0; $i < count($arr_vote); $i++) { ?>
        <div class="card col-lg-3 col-sm-6 col-md-4 col-10" style="margin:20px 30px;">
            <div class="container " style="width: 200px;">
                <img src="<?= base_url() . 'image_vote/' . $arr_vote[$i]->vot_path ?>" class="card-img-top" style="width: 100%; height: 180px; object-fit: contain;">
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
                <div class="row" style="padding: 0px 0px 10px 0px;">
                    <div class="col px-1">
                        <a href="<?= base_url() . 'Choice_vote/show_choice_vote_list/' . $arr_vote[$i]->vot_id; ?>" class="btn btn-info" style="width: 100%;">เลือก</a>
                    </div>
                </div>
                <?php if ($this->session->userdata("use_status") == 2) { ?>
                    <div class="row">
                        <div class="col px-1">
                            <button class="btn btn-warning" style="width: 100%;" onclick="show_modal_edit_vote('<?php echo $arr_vote[$i]->vot_id ?>', '<?php echo $arr_vote[$i]->vot_name ?>','<?php echo substr($arr_vote[$i]->vot_start_time, 0, 10) . 'T' . substr($arr_vote[$i]->vot_start_time, 11, 5) ?>','<?php echo substr($arr_vote[$i]->vot_end_time, 0, 10) . 'T' . substr($arr_vote[$i]->vot_end_time, 11, 5) ?>','<?= base_url() . 'image_vote/' . $arr_vote[$i]->vot_path ?>')">
                                แก้ไข
                            </button>
                        </div>
                        <div class="col px-1">
                            <button class="btn btn-danger" style="width: 100%;" onclick="show_modal_delete_vote(<?= $arr_vote[$i]->vot_id ?>, '<?= $arr_vote[$i]->vot_name ?>')"> ลบ </button>
                        </div>
                    </div>
                    <hr>
                    <?php if ($arr_vote[$i]->vot_status == 1) { ?>
                        <div class="row">
                            <div class="col px-1">
                                <button class="btn btn-success" style="width: 100%;" onclick="show_modal_open_vote(<?= $arr_vote[$i]->vot_id ?>, '<?= $arr_vote[$i]->vot_name ?>')">
                                    เปิดโหวต
                                    <!-- <span class="material-icons">
                                        play_circle_outline
                                    </span> </button> -->
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col px-1">
                                <button class="btn btn-danger" style="width: 100%;" onclick="show_modal_close_vote(<?= $arr_vote[$i]->vot_id ?>, '<?= $arr_vote[$i]->vot_name ?>')">
                                    ปิดโหวต
                                    <!-- <i class="material-icons">
                                        stop
                                </i></button> -->
                            </div>
                        </div>
                    <?php } ?>

                <?php } ?>
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
            <form action="<?php echo base_url() . "Vote/add_vote/" ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row" style="text-align: center; background-color: #F1F2F1;">
                        <div class="container" style="width: 300px; height:auto;">
                            <label for="vot_path" style="margin-top: 10px;">
                                <img src="https://bit.ly/3ubuq5o" alt="" style="width: 100%; height: 200px; object-fit: cover;" id="image_vote">
                                <div class="div-span-image" id="div_span_add">
                                    <span style="font-size: 25px;" id="name_image">+</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">ชื่อโหวต</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="กรอกชื่อโหวต" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="start_vote">วันที่เริ่มโหวต</label>
                            <input class="form-control" type="datetime-local" id="start_vote" name="start_vote" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="end_vote">วันที่สิ้นสุดโหวต</label>
                            <input class="form-control" type="datetime-local" id="end_vote" name="end_vote" required>
                        </div>
                        <div class="form-group col-12">
                            <input type="file" name="vot_path" id="vot_path" accept="image/*" hidden required>
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

<!-- modal edit vote -->
<div class="modal" tabindex="-1" id="modal_edit_vote">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แก้ไขโหวต</h5>
            </div>
            <form action="<?php echo base_url() . "Vote/edit_vote/" ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body edit">
                    <div class="row" style="text-align: center; background-color: #F1F2F1;">
                        <div class="container" style="width: 300px; height:auto;">
                            <label for="vot_path_edit" style="margin-top: 10px;">
                                <img src="https://bit.ly/3ubuq5o" alt="" style="width: 100%; height: 200px; object-fit: cover;" id="image_vote_edit">
                                <div class="div-span-image" id="div_span_edit">
                                    <span style="font-size: 25px;" id="name_image">+</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="hidden" id="id" name="id">
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
                            <input type="file" name="vot_path_edit" id="vot_path_edit" accept="image/*" hidden>
                        </div>
                        <input type="hidden" name="vot_path_old" id="vot_path_old">
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

<!-- modal for delete vote -->
<div class="modal fade" id="delete_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                คุณต้องการลบโหวต <span id="name_vote_del"></span> ?
            </div>
            <div class="modal-footer">
                <button type="button" id="submit_del" class="btn btn-danger">ยืนยัน</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for open vote -->
<div class="modal fade" id="open_vote_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                คุณต้องการเปิดโหวต <span id="name_vote_opn"></span> ?
            </div>
            <div class="modal-footer">
                <button type="button" id="submit_opn" class="btn btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for close vote -->
<div class="modal fade" id="close_vote_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                คุณต้องการปิดโหวต <span id="name_vote_close"></span> ?
            </div>
            <div class="modal-footer">
                <button type="button" id="submit_close" class="btn btn-danger">ยืนยัน</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<script>
    /*  
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-12
     * @Update by Naaka Punparich 62160082
     * @Update Date 2565-03-16
     */

    $( document ).ready(function() {
        let error_add = '<?= $this->session->userdata("add_error_image"); ?>';
        let error_edit = '<?= $this->session->userdata("edit_error_image"); ?>';
        if (error_add == "success") {
            <?= $this->session->unset_userdata("add_error_image"); ?>
            swal("สำเร็จ", "เพิ่มโหวตสำเร็จ", "success");

        } else if (error_add == "fail") {
            <?= $this->session->unset_userdata("add_error_image"); ?>
            swal("ไม่สำเร็จ", "เพิ่มโหวตไม่สำเร็จ", "error");

        }
        preview_image_add();

        if (error_edit == "success") {
            <?= $this->session->unset_userdata("edit_error_image"); ?>
            swal("สำเร็จ", "แก้ไขโหวตสำเร็จ", "success");

        } else if (error_edit == "fail") {
            <?= $this->session->unset_userdata("edit_error_image"); ?>
            swal("ไม่สำเร็จ", "แก้ไขโหวตไม่สำเร็จ", "error");
        }
        preview_image_edit();
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
     * show_modal_edit_vote
     * show modal edit vote
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-12
     * @Update -
     */
    // function show_modal_edit_vote() {
    //     $('#modal_edit_vote').modal();
    // }

    /*  
     * preview_image_add
     * preview image add
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-14
     * @Update -
     */
    function preview_image_add() {
        document.querySelector("#vot_path").addEventListener("change", function(e) {
            if (e.target.files.length == 0) {
                document.querySelector("#div_span_add").style.display = "block";
                document.querySelector("#image_vote").src = 'https://bit.ly/3ubuq5o';
                return;
            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("#div_span_add").style.display = "none";
            document.querySelector("#image_vote").src = url;
        });
    }

    /*  
     * show_modal_delete_vote
     * show modal add vote
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-15
     * @Update -
     */
    function show_modal_delete_vote(id, name) {
        $('#name_vote_del').html(name);

        $('#delete_modal').modal();

        $('#submit_del').click(function() {
            delete_vote_ajax(id);
        });
    }

    /*
     * delete_vote_ajax
     * delete vote 
     * @input id
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-15
     * @Update Date -
     */
    function delete_vote_ajax(id) {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url() . "vote/delete_vote_ajax/" ?>",
            method: "POST",
            data: {
                vot_id: id,
            },
            success: function(data) {
                swal("แจ้งเตือน", "คุณได้ทำการลบโหวตเสร็จสิ้น", "success").then(function() {
                    location.reload();
                });
            },
            error: function() {
                alert('ajax error working');
            }
        });
    }
    /*
     * show_modal_open_vote
     * open modal vote 
     * @input id, name
     * @output -
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2565-03-15
     * @Update Date -
     */
    function show_modal_open_vote(id, name) {
        $('#name_vote_opn').html(name);

        $('#open_vote_modal').modal();

        $('#submit_opn').click(function() {
            update_status_vote_ajax(id, 2);
        });
    }

    /*
     * show_modal_close_vote
     * close modal vote 
     * @input id, name
     * @output -
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2565-03-15
     * @Update Date -
     */
    function show_modal_close_vote(id, name) {
        $('#name_vote_close').html(name);

        $('#close_vote_modal').modal();

        $('#submit_close').click(function() {
            update_status_vote_ajax(id, 1);
        });
    }
    /*
     * update_status_vote_ajax
     * open vote 
     * @input id
     * @output -
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2565-03-15
     * @Update Date -
     */
    function update_status_vote_ajax(id, status) {
        // console.log(id);
        $.ajax({
            url: "<?php echo base_url() . "Vote/update_status_vote_ajax/" ?>",
            method: "POST",
            data: {
                vot_id: id,
                vot_status: status,
            },
            success: function(data) {
                var title = '';
                var detail = '';
                if (status == 1) {
                    title = 'ปิดการโหวต';
                    detail = 'คุณได้ทำการปิดการโหวตเสร็จสิ้น';
                } else if (status == 2) {
                    title = 'เปิดการโหวต';
                    detail = 'คุณได้ทำการเปิดการโหวตเสร็จสิ้น';
                }
                swal(title, detail, "success").then(function() {
                    location.reload();
                });
            },
            error: function() {
                alert('ajax error working');
            }
        });
    }

    /*  
     * show_modal_edit_vote
     * show modal edit vote
     * @input -
     * @output -
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-12
     * @Update by Naaka Punparich 62160082 
     * @Update by Thanisorn thumsawanit 62160088
     */
    function show_modal_edit_vote(id, name, start, end, path) {
        $(".edit #id").val(id);
        $(".edit #name").val(name);
        $(".edit #start_vote").val(start);
        $(".edit #end_vote").val(end);
        $(".edit #image_vote_edit").attr("src", path);
        let result_path = path.split("/");
        $("#vot_path_old").val(result_path[result_path.length - 1]);
        console.log(result_path[result_path.length - 1]);
        $('#modal_edit_vote').modal();
    }

    /*  
     * preview_image_edit
     * preview image edit
     * @input - 
     * @output -
     * @author Naaka Punparich 62160082
     * @Create Date 2565-03-14
     * @Update -
     */
    function preview_image_edit() {
        document.querySelector("#vot_path_edit").addEventListener("change", function(e) {
            if (e.target.files.length == 0) {
                document.querySelector("#div_span_edit").style.display = "block";
                document.querySelector("#image_vote_edit").src = 'https://bit.ly/3ubuq5o';
                return;
            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("#div_span_edit").style.display = "none";
            document.querySelector("#image_vote_edit").src = url;
        });
    }
</script>