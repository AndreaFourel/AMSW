<?php

require_once "../config/DotEnv.php";

// Instantiate DotEnv to get APP_PATH value used in header.php href and src's
(new DotEnv(__DIR__ . '/../.env'))->load();
$appRoot = getenv('APP_PATH');
$title = "AMSW - Admin";
include "./header.php";
?>
<main>
    <h1>Admin</h1>

    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
        Menu admin
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvas">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
               <ul>
                   <li><a href="agent.php">Agents</a> </li>
                   <li>Contacts</li>
                   <li>Cibles</li>
                   <li>Planques</li>
                   <li>Compétences</li>
                   <li>Pays</li>
                   <li>Missions</li>
               </ul>
            </div>
            <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>
<?php
include "./footer.php";
?>
