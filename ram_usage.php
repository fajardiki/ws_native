<?php
    function memory() {
        return round(memory_get_usage()/1048576,2);
    }
?>