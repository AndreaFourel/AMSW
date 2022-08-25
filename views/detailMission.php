<?php

    require_once "../config/DotEnv.php";
    require_once "../Entity/Mission.php";
    require_once "../Controller/MissionController.php";
    // Instantiate DotEnv to get APP_PATH value used in header.php href and src's
    (new DotEnv(__DIR__ . '/../.env'))->load();
    $appRoot = getenv('APP_PATH');
    $title = "AMSW - Détail des missions";
    include "./header.php";

    $missionController = new MissionController();
    $missions = $missionController->getAll();

?>

<main>
    <h1>Détail des missions</h1>


    <form action="detailMission.php" method="post">
        <div class="input-group w-75 m-auto">
            <select class="form-select form-select" aria-label="Choisir une mission" name="mission">
                <option value="" selected>Sélectionnez la mission à détailler</option>
                <?php
                foreach($missions as $mission):
                    ?>
                    <option value="<?php echo $mission->getId()?>"><?php echo $mission->getTitle()?></option>
                <?php endforeach ?>
            </select>
            <button type="submit" class="btn btn-primary">Voir détail</button>
        </div>
    </form>

    <?php
    if(!empty($_POST['mission'])):
        $missionDetail = $missionController->getMissionDetail((int)($_POST['mission']));

        //var_dump($missionDetail);
    ?>


    <div class="card mt-5 w-75 m-auto" >
        <div class="card-body">
            <h5 class="card-title">Nom de la mission: <?php echo $missionDetail->getTitle()?></h5>
            <p class="card-text">Description: <?php echo $missionDetail->getDescription()?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nom de code: <?php echo $missionDetail->getCodeName()?></li>
            <li class="list-group-item">Pays: <?php echo $missionDetail->getCountryId()?></li>
            <li class="list-group-item">Spécialité requise: <?php echo $missionDetail->getSkillId()?></li>
            <li class="list-group-item">Type de mission: <?php echo $missionDetail->getMissionTypeId()?></li>
            <li class="list-group-item">Date de début: <?php echo $missionDetail->getStartDate()?></li>
            <li class="list-group-item">Date de fin: <?php echo $missionDetail->getEndDate()?></li>
            <li class="list-group-item">Status: <?php echo $missionDetail->getStatusId()?></li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Mission précédente</a>
            <a href="#" class="card-link">Mission suivante</a>
        </div>
    </div>
    <?php else:?>
        <h5 class="m-5">Vous devez selectionner une mission</h5>
    <?php endif?>



</main>

<?php
    include "./footer.php";
?>