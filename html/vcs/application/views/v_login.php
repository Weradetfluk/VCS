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

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <i class="material-icons">how_to_vote</i> Vote Camp System
  </a>
</nav>

<form action="<?php echo base_url() . 'VCS_controller/login'?>" method="POST">
    <div class="container container-form">
        <div class="card">
            <div class="card-header" style="text-align: center;">
                <i class="material-icons" style="font-size: 40px;">contacts</i>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col">
                        <label for="username"><span class="material-icons">account_circle</span></label>
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="password"><span class="material-icons">password</span></label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <span style="color: red;">
                    <?php
                    if ($login_fail != NULL) {
                        echo $login_fail;
                    }
                    ?>
                </span>
            </div>
            <div class="card-footer" style="text-align: right;">
                <button type="submit" class="btn btn-primary"><i class="material-icons">login</i></button>
            </div>
        </div>
    </div>

</form>