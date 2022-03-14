<style>
.card {
    /* แต่งการ์ด */
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 25px;
}

.hr {
    /* แต่งเส้นใต้ */
    margin-top: -1%;
    margin-bottom: 3%;
    width: 88%;
    margin-left: auto !important;
    margin-right: auto !important;
}

.low-lebel {
    /* จัด Lebel ใน Modal */
    margin-bottom: 0%;
}
</style>

<div class="container py-4">
    <div class="card">
        <div class="row py-4">
            <div class="col">
                <h2 align="center"><b>จัดการผู้ใช้งาน</b></h2>
            </div>
        </div>
        <!-- หัวเรื่องของตาราง -->

        <div class="row py-3" style="text-align: center">
            <div class="col">
                <h4>ชื่อมกุล</h4>
            </div>
            <!-- ชื่อมกุล -->

            <div class="col">
                <h4>ชื่อผู้ใช้</h4>
            </div>
            <!-- ชื่อผู้ใช้ -->

            <div class="col">
                <h4>รหัสผ่าน</h4>
            </div>
            <!-- รหัสผ่าน -->

            <div class="col">
                <h4>คะแนน</h4>
            </div>
            <!-- คะแนน -->

            <div class="col">
                <h4>จัดการ</h4>
            </div>
            <!-- จัดการ -->
        </div>
        <!-- หัวข้อของตาราง -->
        <hr class="hr">
        <!-- ขีดเส้นใต้ -->

        <?php if (count($arr_user) > 0) { ?>
        <?php for ($i = 0; $i < count($arr_user); $i++) { ?>

        <div class="row py-2" style="text-align: center">
            <div class="col">
                <p><?php echo $arr_user[$i]->use_name ?></p>

            </div>
            <!-- ชื่อมกุล -->

            <div class="col">
                <p><?php echo $arr_user[$i]->use_username ?></p>
            </div>
            <!-- ชื่อผู้ใช้ -->

            <div class="col">
                <p><?php echo $arr_user[$i]->use_password ?></p>
            </div>
            <!-- รหัสผ่าน -->

            <div class="col">
                <p><?php echo $arr_user[$i]->use_point ?></p>
            </div>
            <!-- คะแนน -->

            <div class="col">
                <button type="button" class="btn btn-warning" data-toggle="modal"
                    data-target="#edit_modal">แก้ไข</button>
                <button type="button" class="btn btn-danger"
                    onclick="confirm_delete('<?php echo $arr_user[$i]->use_name ?>', <?php echo $arr_user[$i]->use_id ?>)">ลบ</button>
            </div>
            <!-- ปุ่มจัดการ -->
        </div>

        <?php } ?>
        <!-- For Loop ข้อมูลในตาราง -->
        <?php } else { ?>
        <div class="row py-2" style="text-align: center">
            <div class="col">
                <h4>ไม่มีข้อมูล</h4>
            </div>
            <!-- ไม่มีข้อมูล -->
        </div>
        <?php } ?>
        <!-- if else -->

        <div class="row py-4" style="text-align: center">

            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <!-- เว้นวรรค -->

            <div class="col">
                <button type="button" class="btn btn-success" style="width: 112px;" data-toggle="modal"
                    data-target="#myModal">เพิ่ม</button>
            </div>
            <!-- ปุ่มเพิ่ม -->

        </div>
        <!-- ปุ่มเพิ่มมกุล -->

    </div>
    <!-- การ์ด -->
</div>

<!-- Modal Add -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ใส่ข้อมูลที่ต้องการ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- ปุ่มปิด -->
            </div>
            <!-- ส่วนหัว -->

            <form method='POST' action='<?php echo base_url('VCS_controller/add_manage_user') ?>'>
                <div class="modal-body">
                    <div class="container">
                        <div class="row py-2">
                            <label class="low-lebel">ชื่อมกุล</label>
                            <input type="text" class="form-control" id="use_name" name="use_name"
                                placeholder="ใส่ชื่อมกุล">
                        </div>
                        <!-- ชื่อมกุล -->

                        <div class="row py-2">
                            <label class="low-lebel">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="use_username" name="use_username"
                                placeholder="ใส่ชื่อผู้ใช้">
                        </div>
                        <!-- ชื่อผู้ใช้ -->

                        <div class="row py-2">
                            <label class="low-lebel">รหัสผ่าน</label>
                            <input type="text" class="form-control" id="use_password" name="use_password"
                                placeholder="ใส่รหัสผ่าน">
                        </div>
                        <!-- รหัสผ่าน -->

                        <div class="row py-2">
                            <label class="low-lebel">คะแนน</label>
                            <input type="text" class="form-control" id="use_point" name="use_point"
                                placeholder="ใส่คะแนน">
                        </div>
                        <!-- คะแนน -->

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

<!-- Modal edit user -->
<div class="modal fade" id="edit_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ใส่ข้อมูลที่ต้องการ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- ปุ่มปิด -->
            </div>
            <!-- ส่วนหัว -->

            <form method='POST' action='<?php echo base_url('VCS_controller/update_user_information') ?>'>
                <div class="modal-body">
                    <div class="container">
                        <div class="row py-2">
                            <label class="low-lebel">ชื่อมกุล</label>
                            <input type="text" class="form-control" id="use_name" name="use_name"
                                placeholder="ใส่ชื่อมกุล" >
                                <!-- value="<?php echo $arr_user[$i]->use_name ?>" -->
                        </div>
                        <!-- ชื่อมกุล -->

                        <div class="row py-2">
                            <label class="low-lebel">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="use_username" name="use_username"
                                placeholder="ใส่ชื่อผู้ใช้">
                        </div>
                        <!-- ชื่อผู้ใช้ -->

                        <div class="row py-2">
                            <label class="low-lebel">รหัสผ่าน</label>
                            <input type="text" class="form-control" id="use_password" name="use_password"
                                placeholder="ใส่รหัสผ่าน">
                        </div>
                        <!-- รหัสผ่าน -->

                        <div class="row py-2">
                            <label class="low-lebel">คะแนน</label>
                            <input type="text" class="form-control" id="use_point" name="use_point"
                                placeholder="ใส่คะแนน">
                        </div>
                        <!-- คะแนน -->

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

<!-- modal delete -->
<div class="modal" tabindex="-1" role="dialog" id="modal_delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Prompt', sans-serif !important;">แจ้งเตือน</h5>
            </div>
            <div class="modal-body">
                <p>คุณต้องการที่จะลบ <span id="use_name_confirm"></span> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete_btn" data-dismiss="modal">ยืนยัน</button>
                <button type="button" class="btn btn-secondary" style="color: white; background-color: #777777;"
                    data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>


<script>
/*
 * delete user
 * confirm delete user
 * @input use_id_con
 * @output delete user
 * @author  Acharaporn pornpattanasap 62160344
 * @Create Date 2565-03-12
 * @Update -
 */
function delete_user(use_id_con) {
    $.ajax({
        type: "POST",
        data: {
            use_id: use_id_con
        },
        url: '<?php echo base_url() . 'VCS_controller/delete_user' ?>',
        success: function() {
            swal({
                title: "ลบผู้ใช้งาน",
                text: "คุณได้ทำการลบผู้ใช้งานเสร็จสิ้น",
                type: "success"
            });
            location.reload();
        },
        error: function() {
            alert('ajax error working');
        }

    });

}

/*
 * confirm_delete
 * confirm delete user
 * @input use_name_con, use_id_con
 * @output modal comfirm delete user
 * @author Acharaporn pornpattanasap 62160344
 * @Create Date 2565-03-12
 * @Update -
 */
function confirm_delete(use_name_con, use_id_con) {
    $('#use_name_confirm').text(use_name_con);
    $('#modal_delete').modal();

    $('#delete_btn').click(function() {
        delete_user(use_id_con)
    });
}
</script>