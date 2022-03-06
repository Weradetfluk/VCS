<div class="container" style="margin-top: 10px;">
    <div class="row">
        <?php for($i = 0; $i < count($arr_vote); $i++){?>
            <div class="card col-3" style="margin:20px 30px;">
                <div class="card-header">
                    <?php echo $arr_vote[$i]->vot_name?>
                </div>
                <div class="card-body">
                    <?php echo $arr_vote[$i]->vot_start_time . $arr_vote[$i]->vot_end_time?>
                </div>
            </div>
        <?php }?>
    </div>
</div>