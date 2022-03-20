<style>
  .make-nav {
    text-decoration: none;
    font-size: 18px;
    padding-left: 16px;
  }

  .nav-active{
    background-color: white;
    border-radius: 10px;
  }

  .nav-active a{
    color: black !important;
  }
</style>
<?php 
if (!$this->session->has_userdata("use_id")) {
  $path = site_url()."VCS_controller/show_login_page";
  header("Location: " . $path);
  exit();
}
?>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <i class="material-icons">how_to_vote</i> Vote Camp System
  </a>

  <?php 
  if($this->session->has_userdata("use_status")){
    if($this->session->userdata("use_status") == 2){?>
      <span class="navbar-text">
        <ul class="nav">
          <li class="nav-item nav-active"><a class="nav-link make-nav" href="<?php echo base_url().'Vote/show_vote_list'?>">จัดการโหวต</a></li>
          <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url().'User/show_manage_user_page'?>">จัดการผู้ใช้งาน</a></li>
          <li class="nav-item"><a class="nav-link make-nav" href="<?php echo base_url().'Dashboard_score/show_list_vote_page/'?>">ดูผลโหวต</a></li>
        </ul>
      </span>
    <?php }
    if($this->session->userdata("use_status") == 1){?>
      <span  class="navbar-brand mb-0 h1" style="background-color: white; color:black; border-radius: 10px;padding: 0px 10px;">คะแนนที่มี <?php echo $this->session->userdata("use_point")?></span>
    <?php }?>
    
    <a class="btn btn-outline-danger" href="<?= base_url() . 'VCS_controller/logout'?>">Logout</a>
  <?php }?>
</nav>