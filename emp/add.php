<?php

// database connection file
include 'connect.php';

// if (isset($_POST['add'])) {

//     extract($_POST);
//     $data = array();
//     $data['name'] = $name;
//     $data['email'] = $email;
//     $data['phone'] = $phone;
//     $data['country'] = $country;
//     $data['state'] = $state;
//     $data['city'] = $city;

//     $sql = $emp->mf_query("SELECT id FROM emp WHERE email = '" . $email . "' AND eStatus = 'y'");
//     $row = $emp->mf_fetch_array($sql);

//     if (intval($row['id']) == 0) {
//         $emp->mf_dbinsert('emp', $data);
//         if ($emp) {
//             echo "<script>window.alert('Data Added')</script>";
//             echo "<script>window.open('index.php','_self')</script>";
//         }
//     } else {
//         echo "<script>window.alert('Use different Email')</script>";
//     }
// }
$sql = $emp->mf_query("select id,name from countries");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="data.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />

</head>

<body>
    <div class="container-fluid mt-3">
        <a href="index.php">View Data</a>
    </div>
    <!-- get date from user -->
    <div class="container-fluid col-md-6">
        <h3 class="text-center mt-2">Employee Data</h3>
        <form action="insertdata.php" class="m-3" method="post" id="form">
            <div class="form-outline mb-3">
                <label class="form-label">Name :</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-outline mb-3">
                <label class="form-label">Email :</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-outline mb-3">
                <label class="form-label">Phone :</label>
                <input type="number" name="phone" id="phone" placeholder="Enter Phone" class="form-control" required>
            </div>
            <div class="form-outline mb-3">
                <label class="form-label">Country :</label>
                <!-- <input type="number" name="phone" minlength="10" class="form-control" required> -->
                <select name="country" id="country" class="form-control">
                    <option value="">Select Country</option>
                    <?php
                    while ($fetch = $emp->mf_fetch_array($sql)) {
                        ?>
                        <option value="<?php echo $fetch['id']; ?>">
                            <?php echo $fetch['name']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-3">
                <label class="form-label">State :</label>
                <select name="state" id="state" class="form-control">
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="form-outline mb-3">
                <label class="form-label">City :</label>
                <select name="city" id="city" class="form-control">
                    <option value="">Select City</option>
                </select>
            </div>
            <div class="form-outline mb-3">
                <input type="submit" id="submit" name="add" class="btn btn-dark p-2">
            </div>
        </form>
    </div>

</body>

</html>
<script>
    $(document).ready(function () {
        var form = $('$form'),

            $('#submit').click(function () {

                $.ajax({
                    url: form.attr("action"),
                    type: "POST",
                    data: ("#form input")serialize(),
                    success: function (data) {
                        console.log(data);
                    }
                })
            })
    })
    // $('#submit').on('click', function () {
    //     $.ajax({
    //         url: 'insertdata.php',
    //         type: 'POST',
    //         data: $('#form').serialize(),
    //         success:function(response){
    //         }
    //     })
    // });
    // $(document).ready(function() {
    //     $("#form").submit(function(e) {
    //         var name = $("#name").val();
    //         var email = $("#email").val();
    //         var phone = $("#phone").val();
    //         var country = $("#country").val();
    //         var state = $("#state").val();
    //         var city = $("#city").val();

    //         $.ajax({
    //             url: 'insertdata.php',
    //             type: 'POST',
    //             data: {
    //                 name: name,
    //                 email: email,
    //                 phone: phone,
    //                 country: country,
    //                 state: state,
    //                 city: city
    //             },
    //             success: function(data) {
    //                 alert("Data Added");
    //             }
    //         });
    //     });
    // });
</script>