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
<div class="container border" style="margin-top: 30px;">
    <?php if ($this->session->userdata("use_status") == 2) { ?>
    <div class="row justify-content-md-end my-4">
        <div class="col-md-4">
            <?php if ($this->session->userdata("use_status") == 2) { ?>
                <button type="button" class="btn btn-info" style="float: right;" onclick="show_modal_add_choice_vote()">เพิ่มตัวเลือกโหวต</button><br>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <div class="row justify-content-start">
        <?php for ($i = 0; $i < count($arr_choice_vote); $i++) { ?>

        <div class="card col-lg-3 col-sm-6 col-md-4 col-10" style="margin:20px 30px;">

            <div class="container" style="width: 200px;">
                <img src="<?= base_url() . 'image_choice_vote/' . $arr_choice_vote[$i]->cho_path ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: contain;">
                <div class="card-body">

                    <center><?= $arr_choice_vote[$i]->cho_name ?></center><br>

                    <?php if ($this->session->userdata("use_status") == 2) { ?>
                    <div class="row">
                        <div class="col px-1">
                            <button class="btn btn-warning" style="width: 100%;" data-toggle="modal"
                                data-target="#editModal<?= $arr_choice_vote[$i]->cho_id ?>">
                                แก้ไข
                            </button>
                        </div>
                        <div class="col px-1">
                            <button class="btn btn-danger" style="width: 100%;" data-toggle="modal"
                                data-target="#deleteModal<?= $arr_choice_vote[$i]->cho_id ?>"> ลบ </button>
                        </div>
                    </div>
                    <?php } else { ?>
                    <button class="btn btn-info" style="width: 100%;"
                        onclick="vote_modal(<?= $arr_choice_vote[$i]->cho_id ?>, '<?= $arr_choice_vote[$i]->cho_name ?>')">
                        โหวต
                    </button>
                    <?php } ?>

                </div>
                <input type="hidden" value="<?= $arr_choice_vote[$i]->cho_score ?>"
                    id="score_<?= $arr_choice_vote[$i]->cho_id ?>">
            </div>
        </div>

        <!-- modal for edit choice -->
        <div class="modal fade" id="editModal<?= $arr_choice_vote[$i]->cho_id ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#to_save" method="post">

                            <input type="hidden" id="hid_cho_id<?= $arr_choice_vote[$i]->cho_id ?>"
                                value="<?= $arr_choice_vote[$i]->cho_id ?>">
                            <div class="row">
                                <div class="col-md">
                                    <label>ชื่อตัวเลือกโหวต</label>
                                    <input type="text" class="form-control"
                                        id="txtChoiceName<?= $arr_choice_vote[$i]->cho_id ?>" name="txtChoiceName"
                                        value="<?= $arr_choice_vote[$i]->cho_name  ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <label>คะแนน</label>
                                    <input type="number" class="form-control"
                                        id="txtChoiceScore<?= $arr_choice_vote[$i]->cho_id ?>" name="txtChoiceScore"
                                        value="<?= $arr_choice_vote[$i]->cho_score  ?>">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"
                            onclick="update_choice_vote('<?= $arr_choice_vote[$i]->cho_id ?>')">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal for delete choice -->
        <div class="modal fade" id="deleteModal<?= $arr_choice_vote[$i]->cho_id ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือน</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        คุณต้องการลบรายการ <?= $arr_choice_vote[$i]->cho_name ?> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            onclick="delete_choice_vote('<?= $arr_choice_vote[$i]->cho_id ?>')">ยืนยัน</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </div>
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
                <button id="submit_vote" class="btn btn-success" disabled>ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Choice Vote-->
<div class="modal" tabindex="-1" id="modal_add_choice_vote">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เพิ่มตัวเลือกการโหวต</h5>
            </div>
            <form action="<?php echo base_url() . "User/add_choice_vote/" ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row" style="text-align: center; background-color: #F1F2F1;">
                        <div class="container" style="width: 300px; height:auto;">
                            <label for="cho_path" style="margin-top: 10px;">
                                <img src="https://bit.ly/3ubuq5o" alt="" style="width: 100%; height: 200px; object-fit: cover;" id="image_choice_vote">
                                <div class="div-span-image" id="div_span_add">
                                    <span style="font-size: 25px;" id="name_image">+</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="hidden" class="form-control" id="vot_id" name="vot_id" value="<?= $vot_id ?>">

                        <div class="form-group col-12">
                            <input type="file" name="cho_path" id="cho_path" accept="image/*" hidden required>
                        </div>

                        <div class="form-group col-12">
                            <label class="low-lebel">ชื่อตัวเลือกโหวต</label>
                            <input type="text" class="form-control" id="cho_name" name="cho_name" placeholder="ใส่ชื่อตัวเลือกโหวต">
                       </div>
                       <div class="form-group col-12">
                            <label class="low-lebel">ชื่อระบบ</label>
                            <input type="text" class="form-control" id="cho_system_name" name="cho_system_name" placeholder="ใส่ชื่อระบบ">
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
/*  
     * @author Priyarat Bumrungkit 62160156
     * @Create Date 2565-03-15
     * @Update Priyarat Bumrungkit 62160156
     * @Update Date 2565-03-18
     */
    $(document).ready(function() {
        let error_add = '<?= $this->session->userdata("add_error_image"); ?>';
        if (error_add == "success") {
            <?= $this->session->unset_userdata("add_error_image"); ?>
            swal("สำเร็จ", "เพิ่มโหวตสำเร็จ", "success");

        } else if (error_add == "fail") {
            <?= $this->session->unset_userdata("add_error_image"); ?>
            swal("ไม่สำเร็จ", "เพิ่มโหวตไม่สำเร็จ", "error");

        }
        preview_image_add();
    });

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
        if (score > 0 && score <= <?= $this->session->userdata("use_point") ?>) {
            console.log(1);
            $('#submit_vote').prop('disabled', false);
        } else if (score <= 0) {
            console.log(2);
            $('#submit_vote').prop('disabled', true);
            $('#score_vote').val('');
        } else if (score > <?= $this->session->userdata("use_point") ?>) {
            console.log(3);
            $('#submit_vote').prop('disabled', false);
            $('#score_vote').val(<?= $this->session->userdata("use_point") ?>);
        }
    });

    $('#submit_vote').click(function() {
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
    $('#submit_vote').prop('disabled', true);
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
            swal("สำเร็จ", "คุณได้ทำการโหวตเสร็จสิ้น", "success").then(function() {
                location.reload();
            });
        },
        error: function() {
            alert('ajax error working');
        }
    });
}

function add_choice_vote() {

    $.ajax({
        type: "POST",
        url: '<?php echo site_url() . 'User/add_choice_vote/' ?>',
        data: {
            vot_id: $("#vot_id").val(),
            cho_name: $("#cho_name").val(),
            cho_score: $("#cho_score").val()
        },
        success: function() {
            // swal({
            //         title: "อัพเดทตัวเลือกการโหวต",
            //         text: "อัพเดทตัวเลือกการโหวตเสร็จสิ้น",
            //         type: "success"
            //     },
            //     function() {
            //         location.reload();
            //     })
            location.reload();

        },
        error: function() {
            alert('ajax error working');
        }
    });
}


/*
 * update_choice_vote_ajax
 * update choice vote
 * @input cho_id
 * @output choice vote update
 * @author Jutamas Thaptong 62160079
 * @Create Date 2565-03-12
 */
function update_choice_vote(cho_id) {
    $.ajax({
        type: "POST",
        url: '<?php echo site_url() . 'User/update_choice_vote_ajax/' ?>',
        data: {
            cho_id: $("#hid_cho_id" + cho_id).val(),
            choice_name: $("#txtChoiceName" + cho_id).val(),
            choice_score: $("#txtChoiceScore" + cho_id).val()
        },
        success: function() {
            // swal({
            //         title: "อัพเดทตัวเลือกการโหวต",
            //         text: "อัพเดทตัวเลือกการโหวตเสร็จสิ้น",
            //         type: "success"
            //     },
            //     function() {
            //         location.reload();
            //     })
            location.reload();

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
function delete_choice_vote(cho_id) {
    console.log(cho_id);
    $.ajax({
        type: "POST",
        data: {
            cho_id: cho_id
        },
        url: '<?php echo base_url() . '/User/delete_choice_vote_ajax/' ?>',
        success: function() {
            swal("สำเร็จ", "คุณได้ลบตัวเลือกโหวตเสร็จสิ้น", "success").then(function() {
                location.reload();
            });
        },
        error: function() {
            alert('ajax error working');
        }
    });
}

/*  
* show_modal_add_choice_vote
* show modal add choice vote
* @input -
* @output -
* @author Priyarat Bumrungkit 62160156
* @Create Date 2565-03-18
* @Update -
*/
function show_modal_add_choice_vote() {
        $('#modal_add_choice_vote').modal();
    }

/*  
* preview_image_add
* preview image add
* @input -
* @output -
* @author Priyarat Bumrungkit 62160156
* @Create Date 2565-03-18
* @Update -
*/
function preview_image_add() {
        document.querySelector("#cho_path").addEventListener("change", function(e) {
            if (e.target.files.length == 0) {
                document.querySelector("#div_span_add").style.display = "block";
                document.querySelector("#image_choice_vote").src = 'https://bit.ly/3ubuq5o';
                return;
            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("#div_span_add").style.display = "none";
            document.querySelector("#image_choice_vote").src = url;
        });
}

</script>