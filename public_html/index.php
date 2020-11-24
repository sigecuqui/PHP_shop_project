<?php

require '../bootloader.php';

$db_data = file_to_array(DB_FILE);

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="index__body">
<?php include(ROOT . '/core/templates/nav.php'); ?>
<main>
    <h1>WELCOME TO BBZ SHOP!</h1>

</main>
</body>
</html>

