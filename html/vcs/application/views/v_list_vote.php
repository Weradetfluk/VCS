<div class="container" style="margin-top: 10px;">
    <div class="row">
        <?php for($i = 0; $i < count($arr_vote); $i++){?>
            <div class="card col-lg-3 col-sm-6" style="margin:20px 30px;">
                <img src="<?= base_url().'/images/image_vote.jpg'?>" class="card-img-top">
                <div class="card-body">
                    <center><?php echo $arr_vote[$i]->vot_name?></center><br>
                    <a href="<?= base_url().'/User/show_choice_vote_list/'.$arr_vote[$i]->vot_id;?>" class="btn btn-info" style="width: 100%;">เลือก</a>
                </div>
            </div>
        <?php }?>
    </div>
</div>