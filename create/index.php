<?php
require_once '../netting/class.crud.php';
$db = new crud();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Div</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="content-container">
    <?php
    //Bazada eyer div varsa ekranda gosterecek
    $sql = $db->read("jsdiv");
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        print_r($row['content']);
    }
    //------------------------------------------
    ?>
    <button class="btn btn-primary" id="increment" style="margin: 35px;" onClick="makeDiv()">Click and Create</button>
</body>
<footer>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/ajax.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</footer>
</html>