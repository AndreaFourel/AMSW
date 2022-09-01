<?php

require_once "../config/DotEnv.php";

// Instantiate DotEnv to get APP_PATH value used in header.php href and src's
(new DotEnv(__DIR__ . '/../.env'))->load();
$appRoot = getenv('APP_PATH');
$title = "AMSW - Admin";
include "./header.php";
?>
<main>
    <h1>Liste des agents actifs</h1>
</main>



<?php
include "./footer.php";
?>
