<main>
    <h1>Détail des missions</h1>

    <form action="missionDetail" method="post">
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
    if (isset($missionById)) { ?>
    <div class="card mt-5 w-75 m-auto" >
        <div class="card-body">
            <h5 class="card-title"><?php echo $missionById->getTitle()?></h5>
            <p class="card-text"><?php echo $missionById->getDescription()?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nom de code : <?php echo $missionById->getCodeName()?></li>
            <li class="list-group-item">Pays de la mission : <?php echo $countryById->getName()?></li>
            <li class="list-group-item">Spécialité requise pour cette mission : <?php echo $skillById->getName()?></li>
            <li class="list-group-item">Type de mission : <?php echo $missionTypeById->getName()?></li>
            <li class="list-group-item">Date de début : <?php echo $missionById->getStartDate()?></li>
            <li class="list-group-item">Date de fin : <?php echo $missionById->getEndDate()?></li>
            <li class="list-group-item" style="color: #<?php echo $missionStatusById->getColor() ?>" >Status : <?php echo $missionStatusById->getStatus() ?></li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Mission précédente</a>
            <a href="#" class="card-link">Mission suivante</a>
        </div>
    </div>

    <?php }    ?>

</main>