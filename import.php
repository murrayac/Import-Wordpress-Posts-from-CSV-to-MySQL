<?php
    set_time_limit(0);
    ini_set('memory_limit', '2048M');

    $cn = mysql_connect('localhost','root','1');
    mysql_select_db('bitnami_wordpress',$cn);
    $path = "hotels.csv"; // SET YOUR CSV FILE PATH HERE
    $row = 1;
    if (($handle = fopen($path, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 100000000, ";")) !== FALSE) {
            $row++;
            $data_entries[] = $data ;
        }
        fclose($handle);
    }
    $final_data = array();
    $count = 0 ;
    array_shift($data_entries);
    foreach ($data_entries as $value) {
        $temp = implode('', $value);
        $tempArr = explode('|', $temp);
        $final_data[] = $tempArr;
        $ins_str = "INSERT INTO wp_posts values('','','','','".mysql_real_escape_string($tempArr[27])."','".mysql_real_escape_string($tempArr[1])."','','".mysql_real_escape_string($tempArr[18])."','','','','".mysql_real_escape_string($tempArr[2])."','','','','','','','','','".mysql_real_escape_string($tempArr[17])."','','')";
        mysql_query($ins_str,$cn);
        $post_id = mysql_insert_id($cn);

        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','list-id','".$tempArr[0]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','airport_code','".$tempArr[3]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','location','".$tempArr[4]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','job_listing_region','".$tempArr[5]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','geolocation_formatted_address','".$tempArr[6]."')";
        mysql_query($ins_str,$cn);

        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','geolocation_city','".$tempArr[7]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','geolocation_state_short','".$tempArr[8]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','geolocation_country_short','".$tempArr[9]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','geolocation_postcode','".$tempArr[10]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','geolocation_long','".$tempArr[11]."')";
        mysql_query($ins_str,$cn);

        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','geolocation_lat','".$tempArr[12]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','low_rate','".$tempArr[13]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','high_rate','".$tempArr[14]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','confidence','".$tempArr[15]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','job_listing_category','".$tempArr[16]."')";
        mysql_query($ins_str,$cn);

        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','comment_status','".$tempArr[19]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','_filled','".$tempArr[20]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','_featured','".$tempArr[21]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','native_currency','".$tempArr[22]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','number_of_rooms','".$tempArr[23]."')";
        mysql_query($ins_str,$cn);

        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','number_of_floors','".$tempArr[24]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','check_in_time','".$tempArr[25]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','check_out_time','".$tempArr[26]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','destination_id','".$tempArr[28]."')";
        mysql_query($ins_str,$cn);
        $ins_str = "INSERT INTO wp_postmeta VALUES('','".$post_id."','nearby_attractions','".mysql_real_escape_string($tempArr[29])."')";
        mysql_query($ins_str,$cn);
    }
?>
