<?php
    function cleanData($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }