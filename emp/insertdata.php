<?php

// database connection file
include 'connect.php';

//add data to database
if (isset($_POST['add'])) {

    extract($_POST);
    $data = array();
    $data['name'] = $name;
    $data['email'] = $email;
    $data['phone'] = $phone;
    $data['country'] = $country;
    $data['state'] = $state;
    $data['city'] = $city;

    $sql = $emp->mf_query("SELECT id FROM emp WHERE email = '" . $email . "' AND eStatus = 'y'");
    $row = $emp->mf_fetch_array($sql);

    if (intval($row['id']) == 0) {
        $emp->mf_dbinsert('emp', $data);
        if ($emp) {
            echo "<script>window.alert('Data Added')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    } else {
        echo "<script>window.alert('Use different Email')</script>";
    }
}
?>