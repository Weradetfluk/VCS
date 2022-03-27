<style>
  .make-nav {
    text-decoration: none;
    font-size: 18px;
    padding-left: 16px;
  }

  .nav-active {
    background-color: white;
    border-radius: 10px;
  }

  .nav-active a {
    color: black !important;
  }

  .navbar {
    overflow: hidden;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1;
  }
</style>
<?php
if (!$this->session->has_userdata("use_id")) {
  $path = site_url() . "VCS_controller/show_login_page";
  header("Location: " . $path);
  exit();
}
?>
<nav class="navbar navbar-dark bg-dark">
  <div class="col-3">
    <a class="navbar-brand" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">
      <!-- <i class="material-icons">how_to_vote</i> Vote Camp System -->
      <img src="<?php echo base_url().'asset/image_vcs/logo.png'?>" alt="" width="40"> Vote Camp System
    </a>
  </div>

  <div class="col text-center">
    <?php
    if ($this->session->has_userdata("use_status")) {
      if ($this->session->userdata("use_status") == 2) { ?>
        <span class="navbar-text">
          <ul class="nav">
            <?php if ($this->session->userdata("page") == 1) { ?>
              <li class="nav-item nav-active"><a class="nav-link make-nav" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">จัดการโหวต</a></li>
              <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url() . 'User/show_manage_user_page' ?>">จัดการผู้ใช้งาน</a></li>
              <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url() . 'Dashboard_score/show_list_vote_page/' ?>">ดูผลโหวต</a></li>
            <?php } elseif ($this->session->userdata("page") == 2) { ?>
              <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">จัดการโหวต</a></li>
              <li class="nav-item nav-active"><a class="nav-link make-nav" href="<?php echo base_url() . 'User/show_manage_user_page' ?>">จัดการผู้ใช้งาน</a></li>
              <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url() . 'Dashboard_score/show_list_vote_page/' ?>">ดูผลโหวต</a></li>
            <?php } elseif ($this->session->userdata("page") == 3) { ?>
              <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">จัดการโหวต</a></li>
              <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url() . 'User/show_manage_user_page' ?>">จัดการผู้ใช้งาน</a></li>
              <li class="nav-item nav-active"><a class="nav-link make-nav" href="<?php echo base_url() . 'Dashboard_score/show_list_vote_page/' ?>">ดูผลโหวต</a></li>
            <?php } ?>
          </ul>
        </span>
      <?php } ?>
  </div>

  <div class="col-3 form-inline" style="justify-content: right;">
    <?php if ($this->session->userdata("use_status") == 1) { ?>
      <span class="navbar-brand mb-0 h1 float-right" style="background-color: white; color:black; border-radius: 10px;padding: 0px 10px;">คะแนนที่มี <?php echo $this->session->userdata("use_point") ?></span>
    <?php } ?>
    <a class="btn btn-outline-danger float-right" href="<?= base_url() . 'VCS_controller/logout' ?>">Logout</a>
  </div>
<?php } ?>
</nav>