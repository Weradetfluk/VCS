<style>
  /*----------bootstrap-navbar-css------------*/
  .navbar-logo {
    padding-left: 15px;
    color: #fff;
  }

  .navbar-logo:hover {
    color: #fff;
  }

  .navbar-mainbg {
    background-color: #4d4d4d;
    padding: 0px;
  }

  #navbarSupportedContent {
    overflow: hidden;
    position: relative;
  }

  #navbarSupportedContent ul {
    padding: 0px;
    margin: 0px;
  }

  #navbarSupportedContent ul li a i {
    margin-right: 10px;
  }

  #navbarSupportedContent li {
    list-style-type: none;
    float: left;
  }

  #navbarSupportedContent ul li a {
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
    font-size: 15px;
    display: block;
    padding: 20px 20px;
    transition-duration: 0.6s;
    transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
  }

  #navbarSupportedContent>ul>li.active>a {
    color: #4d4d4d;
    background-color: transparent;
    transition: all 0.7s;
  }

  #navbarSupportedContent a:not(:only-child):after {
    content: "\f105";
    position: absolute;
    right: 20px;
    top: 10px;
    font-size: 14px;
    font-family: "Font Awesome 5 Free";
    display: inline-block;
    padding-right: 3px;
    vertical-align: middle;
    font-weight: 900;
    transition: 0.5s;
  }

  #navbarSupportedContent .active>a:not(:only-child):after {
    transform: rotate(90deg);
  }

  .hori-selector {
    display: inline-block;
    position: absolute;
    height: 100%;
    top: 0px;
    left: 105%;
    transition-duration: 0.6s;
    transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    background-color: #fff;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    margin-top: 10px;
  }

  .hori-selector .right,
  .hori-selector .left {
    position: absolute;
    width: 25px;
    height: 25px;
    background-color: #fff;
    bottom: 10px;
  }

  .hori-selector .right {
    right: -25px;
  }

  .hori-selector .left {
    left: -25px;
  }

  .hori-selector .right:before,
  .hori-selector .left:before {
    content: '';
    position: absolute;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #4d4d4d;
  }

  .hori-selector .right:before {
    bottom: 0;
    right: -25px;
  }

  .hori-selector .left:before {
    bottom: 0;
    left: -25px;
  }


  @media(min-width: 992px) {
    .navbar-expand-custom {
      -ms-flex-flow: row nowrap;
      flex-flow: row nowrap;
      -ms-flex-pack: start;
      justify-content: flex-start;
    }

    .navbar-expand-custom .navbar-nav {
      -ms-flex-direction: row;
      flex-direction: row;
    }

    .navbar-expand-custom .navbar-toggler {
      display: none;
    }

    .navbar-expand-custom .navbar-collapse {
      display: -ms-flexbox !important;
      display: flex !important;
      -ms-flex-preferred-size: auto;
      flex-basis: auto;
    }
  }


  @media (max-width: 991px) {
    #navbarSupportedContent ul li a {
      padding: 12px 30px;
    }

    .hori-selector {
      margin-top: 0px;
      margin-left: 10px;
      border-radius: 0;
      border-top-left-radius: 25px;
      border-bottom-left-radius: 25px;
    }

    .hori-selector .left,
    .hori-selector .right {
      right: 10px;
    }

    .hori-selector .left {
      top: -25px;
      left: auto;
    }

    .hori-selector .right {
      bottom: -25px;
    }

    .hori-selector .left:before {
      left: -25px;
      top: -25px;
    }

    .hori-selector .right:before {
      bottom: -25px;
      left: -25px;
    }
  }
</style>
<?php
if (!$this->session->has_userdata("use_id")) {
  $path = site_url() . "VCS_controller/show_login_page";
  header("Location: " . $path);
  exit();
}
?>
<nav class="navbar navbar-expand-custom navbar-mainbg">
  <a class="navbar-brand navbar-logo" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">
    <img src="<?php echo base_url() . 'asset/image_vcs/logo.png' ?>" alt="" width="40"> Vote Camp System
  </a>
  <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="material-icons" style="color: #fff;">menu</i>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <div class="hori-selector">
        <div class="left"></div>
        <div class="right"></div>
      </div>
      <?php if($this->session->userdata("use_status") == 2){?>
        <?php if ($this->session->userdata("page") == 1) { ?>
          <li class="nav-item active"><a class="nav-link" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">??????????????????????????????</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'User/show_manage_user_page' ?>">?????????????????????????????????????????????</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'Dashboard_score/show_list_vote_page/' ?>">????????????????????????</a></li>
        <?php } elseif ($this->session->userdata("page") == 2) { ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">??????????????????????????????</a></li>
          <li class="nav-item active"><a class="nav-link" href="<?php echo base_url() . 'User/show_manage_user_page' ?>">?????????????????????????????????????????????</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'Dashboard_score/show_list_vote_page/' ?>">????????????????????????</a></li>
        <?php } elseif ($this->session->userdata("page") == 3) { ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'Vote/show_vote_list' ?>">??????????????????????????????</a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'User/show_manage_user_page' ?>">?????????????????????????????????????????????</a></li>
          <li class="nav-item active"><a class="nav-link" href="<?php echo base_url() . 'Dashboard_score/show_list_vote_page/' ?>">????????????????????????</a></li>
        <?php } ?>
      <?php } ?>
    </ul>
  </div>
  <div class="form-inline" style="margin-right: 15px;">
    <?php if ($this->session->userdata("use_status") == 1) { ?>
      <span style="background-color: white; color:black; border-radius: 10px; padding: 5px 10px; margin-right: 10px; margin-left: 15px;">?????????????????????????????? <?php echo $this->session->userdata("use_point"); ?></span>
    <?php } ?>
    <a class="btn btn-outline-danger" style="margin-left: 15px;" href="<?= base_url() . 'VCS_controller/logout' ?>">Logout</a>
  </div>
</nav>

<script>
  // ---------Responsive-navbar-active-animation-----------
  function test() {
    var tabsNewAnim = $('#navbarSupportedContent');
    var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
    var activeItemNewAnim = tabsNewAnim.find('.active');
    var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
    var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
    var itemPosNewAnimTop = activeItemNewAnim.position();
    var itemPosNewAnimLeft = activeItemNewAnim.position();
    $(".hori-selector").css({
      "top": itemPosNewAnimTop.top + "px",
      "left": itemPosNewAnimLeft.left + "px",
      "height": activeWidthNewAnimHeight + "px",
      "width": activeWidthNewAnimWidth + "px"
    });
    $("#navbarSupportedContent").on("click", "li", function(e) {
      $('#navbarSupportedContent ul li').removeClass("active");
      $(this).addClass('active');
      var activeWidthNewAnimHeight = $(this).innerHeight();
      var activeWidthNewAnimWidth = $(this).innerWidth();
      var itemPosNewAnimTop = $(this).position();
      var itemPosNewAnimLeft = $(this).position();
      $(".hori-selector").css({
        "top": itemPosNewAnimTop.top + "px",
        "left": itemPosNewAnimLeft.left + "px",
        "height": activeWidthNewAnimHeight + "px",
        "width": activeWidthNewAnimWidth + "px"
      });
    });
  }
  $(document).ready(function() {
    setTimeout(function() {
      test();
    });
  });
  $(window).on('resize', function() {
    setTimeout(function() {
      test();
    }, 500);
  });
  $(".navbar-toggler").click(function() {
    $(".navbar-collapse").slideToggle(300);
    setTimeout(function() {
      test();
    });
  });



  // --------------add active class-on another-page move----------
  jQuery(document).ready(function($) {
    // Get current path and find target link
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if (path == '') {
      path = 'index.html';
    }

    var target = $('#navbarSupportedContent ul li a[href="' + path + '"]');
    // Add active class to target link
    target.parent().addClass('active');
  });




  // Add active class on another page linked
  // ==========================================
  // $(window).on('load', function() {
  //   var current = location.pathname;
  //   console.log(current);
  //   $('#navbarSupportedContent ul li a').each(function() {
  //     var $this = $(this);
  //     // if the current path is like this link, make it active
  //     if ($this.attr('href').indexOf(current) !== -1) {
  //       $this.parent().addClass('active');
  //       $this.parents('.menu-submenu').addClass('show-dropdown');
  //       $this.parents('.menu-submenu').parent().addClass('active');
  //     } else {
  //       $this.parent().removeClass('active');
  //     }
  //   })
  // });
</script>