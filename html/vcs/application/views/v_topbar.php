<style>
  .make-nav {
    text-decoration: none;
    font-size: 18px;
    padding-left: 16px;
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
        <a class="make-nav" href="<?php echo base_url().'User/show_vote_list'?>">จัดการผลโหวด</a>
        <a class="make-nav" href="<?php echo base_url().'VCS_controller/show_manage_user_page'?>">จัดการผู้ใช้งาน</a>
        <a class="make-nav" href="<?php echo base_url().'Dashboard_score/show_dasbord_score_page/1'?>">ดูผลโหวด</a>
      </span>
    <?php }?>
    <a class="btn btn-outline-danger" href="<?= base_url() . 'VCS_controller/logout'?>">Logout</a>
    <!-- <a class="make-nav" href="<?= base_url() . 'VCS_controller/logout'?>">Logout</a> -->
  <?php }?>
</nav>