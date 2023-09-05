<?php

include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <script src="data.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
 
</head>

<body>

    <div class="container-fluid mt-3">
        <a href="add.php">Add Data</a>
    </div>
    <div class="container-fluid col-md-8">
        <table id="emptbl" class="display" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
        </table>
    </div>
</body>
