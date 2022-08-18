<?php

    require_once "../config/DotEnv.php";
    // Instantiate DotEnv to get APP_PATH value used in header.php href and src's
    (new DotEnv(__DIR__ . '/../.env'))->load();
    $appRoot = getenv('APP_PATH');
    $title = "AMSW - Détail des missions";
    include "./header.php";

?>

<main>
    <h2>Détail des mission</h2>
</main>

<?php
    include "./footer.php";
?>