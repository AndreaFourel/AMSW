
<?php

    require_once "./config/DotEnv.php";
    require_once "./Entity/Mission.php";
    require_once "./Controller/MissionController.php";

    // Instantiate DotEnv to get APP_PATH value used in header.php href and src's
    (new DotEnv(__DIR__ . '/.env'))->load();
    $appRoot = getenv('APP_PATH');
    $title = "AMSW - Missions";

    include "./views/header.php";

    $missionController = new MissionController();
    $missions = $missionController->getAll();



?>

<main>
    <section class="mission-list">
        <h1 class="my-5">Liste des missions</h1>
        <p><?php
            $key = "snake_case";
            echo implode('', array_map('ucfirst', explode('_', $key)))?></p>
        <div class="table-responsive-sm mt-5">

            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mission</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Détail</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($missions as $mission):
                    ?>
                    <tr class="list-row">
                        <th scope="row"><?php echo $mission->getId()?></th>
                        <td><?php echo $mission->getTitle()?></td>
                        <td><?php echo $mission->getStatusId()?></td>
                        <td>
                            <a href="#" class="btn btn-dark btn-binoculars" data-bs-toggle="tooltip" data-bs-placement="top" title="Détail de la mission"><i class="bi bi-binoculars-fill"></i></a>


                        </td>
                    </tr>
                <?php endforeach ?>


                </tbody>
            </table>
        </div>
    </section>

</main>
<?php
include "./views/footer.php";
?>
