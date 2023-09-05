<?php

include 'connect.php';

if (!empty($_POST['c_id'])) {
    $id = $_POST['c_id'];

    $sql = $emp->mf_query("select * from states where country_id = '$id'");

    while ($state = $emp->mf_fetch_array($sql)) {
?>
        <option value="<?php echo $state['id']; ?>">
            <?php echo $state['StateName']; ?>
        </option>
<?php
    }
}
