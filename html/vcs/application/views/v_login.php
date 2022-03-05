<?php 
    $login_fail = $login_fail ?? ''; // เช็คว่ามีตัวแปรที่ชื่อ login_fail หรือไม่ ถ้าไม่มี จะ set เป็นค่าว่าง
?>

<style>
    .container-form {
        display: flex;
        justify-content: center;
        flex-direction: row;
        padding-top: 20px;
    }
</style>

<form action="<?php echo base_url() . 'VCS_controller/login' ?>" method="POST">
    <div class="container container-form">
        <div class="card">
            <div class="card-header" style="text-align: center;">
                Login
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <label for="username"><span class="material-icons">account_circle</span></label>
                        <input class="form-control" type="text" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="password"><span class="material-icons">password</span></label>
                        <input class="form-control" type="text" name="password" placeholder="Password">
                    </div>
                </div>
                <span style="color: red; margin-left: 30px;">
                    <?php
                    if ($login_fail != NULL) {
                        echo $login_fail;
                    }
                    ?>
                </span>
            </div>
            <div class="card-footer" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>

</form>