<!-- jquery -->
<script src="<?php echo base_url().'asset/bootstrap-4.6.1-dist'?>/js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url().'asset/bootstrap-4.6.1-dist'?>/js/bootstrap.min.js" type="text/javascript"></script>


<!-- sweet alert -->
<script src="<?php echo base_url().'asset/bootstrap-4.6.1-dist'?>/js/sweetalert.min.js" type="text/javascript"></script>

<script>
    /*  
     * format_date
     * format date
     * @input  old_date
     * @output format
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-03-12
     * @Update -
     */
    function format_date(old_date) {
        let month_name = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
        let date_old = new Date(old_date);
        let year_thai = date_old.getFullYear()+543;
        let format = date_old.getDate() + ' ' + month_name[date_old.getMonth()] + ' ' + year_thai;
        return format;
    }
</script>
    