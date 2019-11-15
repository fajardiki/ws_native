<?php 

    include "conn.php";

    // AUTH TENANT
    $gps_contact = "SELECT * FROM gps_contact";
    $query_gps_contact = mysqli_query($koneksi,$gps_contact);

    while ($dtat=mysqli_fetch_array($query_gps_contact)) {
        $item[] = array(
            "gpscar_id"=>$dtat["gpscar_id"],
            "gpscar_nopol"=>$dtat["gpscar_nopol"],
            "gpscar_vendor"=>$dtat["gpscar_vendor"],
            "gpscar_group_area"=>$dtat["gpscar_group_area"],
            "gpscar_group"=>$dtat["gpscar_group"],
            "gpscar_rs"=>$dtat["gpscar_rs"],
            "gpscar_typekendaraan"=>$dtat["gpscar_typekendaraan"],
            "gpscar_tahun"=>$dtat["gpscar_tahun"],
            "gpscar_lat"=>$dtat["gpscar_lat"],
            "gpscar_lng"=>$dtat["gpscar_lng"],
            "gpscar_kecepatan"=>$dtat["gpscar_kecepatan"],
            "gpscar_jarak"=>$dtat["gpscar_jarak"],
            "gpscar_waktu"=>$dtat["gpscar_waktu"],
            "gpscar_lokasikode"=>$dtat["gpscar_lokasikode"],
            "gpscar_lokasinama"=>$dtat["gpscar_lokasinama"],
            "gpscar_areakode"=>$dtat["gpscar_areakode"],
            "gpscar_areanama"=>$dtat["gpscar_areanama"],
            "gpscar_direction"=>$dtat["gpscar_direction"],
            "gpscar_status"=>$dtat["gpscar_status"],
            "gpscar_posisi"=>$dtat["gpscar_posisi"],
            "gpscar_mesin"=>$dtat["gpscar_mesin"],
            "gpscar_aktif"=>$dtat["gpscar_aktif"],
            "gpscar_lup"=>$dtat["gpscar_lup"]      

        );
    }

    $json = array(
        'result'=>'succes',
        'Gps_Contact'=>$item
    );

    echo json_encode($json);
?>