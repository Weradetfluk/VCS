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

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    body {
        background-color: #212121;
        color: #fff;
        font-family: monospace, serif;
        letter-spacing: 0.05em;
    }

    h1 {
        font-size: 23px;
    }

    .form {
        /* width: 300px; */
        padding: 64px 15px 24px;
        margin: 0 auto;
        margin-top: 8%;
        width: 23%;
        margin-left: auto;
        margin-right: auto;
    }

    .form .control {
        margin: 0 0 24px;
    }

    .form .control input {
        width: 100%;
        padding: 14px 16px;
        border: 0;
        background: transparent;
        color: #fff;
        font-family: monospace, serif;
        letter-spacing: 0.05em;
        font-size: 16px;
    }

    .form .control input:hover,
    .form .control input:focus {
        outline: none;
        border: 0;
    }

    .form .btn {
        width: 100%;
        display: block;
        padding: 14px 16px;
        background: transparent;
        outline: none;
        border: 0;
        color: #fff;
        letter-spacing: 0.1em;
        font-weight: bold;
        font-family: monospace;
        font-size: 16px;
    }

    .block-cube {
        position: relative;
    }

    .block-cube .bg-top {
        position: absolute;
        height: 10px;
        background: #020024;
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(52, 9, 121, 1) 37%, rgba(0, 212, 255, 1) 94%);
        bottom: 100%;
        left: 5px;
        right: -5px;
        transform: skew(-45deg, 0);
        margin: 0;
    }

    .block-cube .bg-top .bg-inner {
        bottom: 0;
    }

    .block-cube .bg {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        background: #020024;
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(52, 9, 121, 1) 37%, rgba(0, 212, 255, 1) 94%);
    }

    .block-cube .bg-right {
        position: absolute;
        background: #020024;
        background: rgba(0, 212, 255, 1);
        top: -5px;
        z-index: 0;
        bottom: 5px;
        width: 10px;
        left: 100%;
        transform: skew(0, -45deg);
    }

    .block-cube .bg-right .bg-inner {
        left: 0;
    }

    .block-cube .bg .bg-inner {
        transition: all 0.2s ease-in-out;
    }

    .block-cube .bg-inner {
        background: #212121;
        position: absolute;
        left: 2px;
        top: 2px;
        right: 2px;
        bottom: 2px;
    }

    .block-cube .text {
        position: relative;
        z-index: 2;
    }

    .block-cube.block-input input {
        position: relative;
        z-index: 2;
    }

    .block-cube.block-input input:focus~.bg-right .bg-inner,
    .block-cube.block-input input:focus~.bg-top .bg-inner,
    .block-cube.block-input input:focus~.bg-inner .bg-inner {
        top: 100%;
        background: rgba(255, 255, 255, 0.5);
    }

    .block-cube.block-input .bg-top,
    .block-cube.block-input .bg-right,
    .block-cube.block-input .bg {
        background: rgba(255, 255, 255, 0.5);
        transition: background 0.2s ease-in-out;
    }

    .block-cube.block-input .bg-right .bg-inner,
    .block-cube.block-input .bg-top .bg-inner {
        transition: all 0.2s ease-in-out;
    }

    .block-cube.block-input:focus .bg-top,
    .block-cube.block-input:hover .bg-top,
    .block-cube.block-input:focus .bg-right,
    .block-cube.block-input:hover .bg-right,
    .block-cube.block-input:focus .bg,
    .block-cube.block-input:hover .bg {
        background: rgba(255, 255, 255, 0.8);
    }

    .block-cube.block-cube-hover:focus .bg .bg-inner,
    .block-cube.block-cube-hover:hover .bg .bg-inner {
        top: 100%;
    }

    .credits {
        position: fixed;
        left: 0;
        bottom: 0;
        padding: 15px 15px;
        width: 100%;
        z-index: 111;
    }

    .credits a {
        opacity: 0.6;
        color: #fff;
        font-size: 11px;
        text-decoration: none;
    }

    .credits a:hover {
        opacity: 1;
    }
</style>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url().'asset/image_vcs/logo.png'?>" alt="" width="40"> Vote Camp System
    </a>
</nav>

<form class="form" action="<?php echo base_url() . 'VCS_controller/login' ?>" method="POST">
    <div class="control">
        <h1>
            Sign In
        </h1>
    </div>
    <div class="control block-cube block-input">
        <input class="form-control" type="text" name="username" placeholder="Username" required>
        <div class="bg-top">
            <div class="bg-inner"></div>
        </div>
        <div class="bg-right">
            <div class="bg-inner"></div>
        </div>
        <div class="bg">
            <div class="bg-inner"></div>
        </div>
    </div>
    <div class="control block-cube block-input">
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <div class="bg-top">
            <div class="bg-inner"></div>
        </div>
        <div class="bg-right">
            <div class="bg-inner"></div>
        </div>
        <div class="bg">
            <div class="bg-inner"></div>
        </div>
    </div>
    <button class="btn block-cube block-cube-hover">
        <div class="bg-top">
            <div class="bg-inner"></div>
        </div>
        <div class="bg-right">
            <div class="bg-inner"></div>
        </div>
        <div class="bg">
            <div class="bg-inner"></div>
        </div>
        <div class="text">
            Log In
        </div>
    </button>
    <!-- Error -->
    <span style="color: white;">
        <?php
        if ($login_fail != NULL) {
            echo $login_fail;
        }
        ?>
    </span>
    <!-- Error -->
    <div class="credits">
        <!-- <a href="https://codepen.io/marko-zub/"></a> -->
    </div>
</form>

<!-- 
<form action="<?php echo base_url() . 'VCS_controller/login' ?>" method="POST">
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
</form> -->