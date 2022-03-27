<?php
/*
* to_format_abbreviation
* set format date โดยเดือนเป็นตัวย่อ
* @input -
* @output -
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-12
* @Update Date -
*/
function to_format_abbreviation($old_date)
{
     $month_name = [ "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.", ];

     $year = substr($old_date, 0, strpos($old_date, '-'));

     $year_thai = intval($year) + 543;

     $month =   substr($old_date, strpos($old_date, '-') + 1, 2);
     $day   =  substr($old_date, strpos($old_date, '-') + 4, 2);



     if (intval($month) - 1 < 0) {
          $format = "-";
     } else {
          $format = $day  . " " . $month_name[intval($month) - 1] . " " . $year_thai;
     }


     return  $format;
}
?>