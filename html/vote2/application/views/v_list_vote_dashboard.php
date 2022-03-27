<style>
    .div-span-image {
    position: relative;
    height: 40px;
    margin-top: -40px;
    background: rgba(0, 0, 0, 0.5);
    text-align: center;
    line-height: 40px;
    font-size: 13px;
    color: #f5f5f5;
    font-weight: 600;
    }
    </style>
    <div class="container body">
        <div class="row">
            <?php for ($i = 0; $i < count($arr_vote['arr_vote']); $i++) { ?>
                <div class="card col-lg-3 col-sm-6 col-md-4 col-10" style="margin:20px 30px;">
                    <div class="container" style="width: 200px;">
                        <img src="<?= base_url() . 'image_vote/' . $arr_vote['arr_vote'][$i]->vot_path ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: contain;">
                    </div>
                    <div class="card-body">
                        <center>
                            <h5><?php echo $arr_vote['arr_vote'][$i]->vot_name ?></h5>
                            <hr width="100%">
                        </center>
                        <p>
                            <?php echo 'เริ่ม ' . to_format_abbreviation(explode(" ", $arr_vote['arr_vote'][$i]->vot_start_time)[0]) . ' เวลา ' . substr(explode(" ", $arr_vote['arr_vote'][$i]->vot_start_time)[1], 0, 5) ?>
                        </p>
                        <p>
                            <?php echo 'สิ้นสุด ' . to_format_abbreviation(explode(" ", $arr_vote['arr_vote'][$i]->vot_end_time)[0]) . ' เวลา ' . substr(explode(" ", $arr_vote['arr_vote'][$i]->vot_end_time)[1], 0, 5) ?>
                        </p>
                        <div class="row" style="padding: 0px 0px 10px 0px;">
                            <div class="col px-1">
                                <a href="<?= base_url() . 'Dashboard_score/show_dasbord_score_page/' . $arr_vote['arr_vote'][$i]->vot_id . '/' . $arr_vote['arr_vote'][$i]->vot_name;?>" class="btn btn-info" style="width: 100%;">เลือก</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- container -->