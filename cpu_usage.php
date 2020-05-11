<?php 
    function get_cpu_usage() {
        $cmd = "wmic cpu get loadpercentage";
        exec($cmd, $output, $value);

        if ($value==0) {
            return $output[1];
        } else {
            return "Cannot Get CPU Usage!";
        }
    }
?>