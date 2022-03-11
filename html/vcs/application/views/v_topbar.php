<style>
  .make-nav {
    text-decoration: none;
    font-size: 18px;
    padding-left: 16px;
  }
</style>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <i class="material-icons">how_to_vote</i> Vote Camp System
  </a>
  <?php if($_SESSION['use_status'] == 2){?>
    <span class="navbar-text">
      <a class="make-nav" href="#">จัดการผลโหวด</a>
      <a class="make-nav" href="#">จัดการผู้ใช้งาน</a>
      <a class="make-nav" href="#">ดูผลโหวด</a>
    </span>
  <?php }?>
</nav>