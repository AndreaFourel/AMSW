<main>
    <section class="mission-list">
        <h1 class="my-5">Liste des missions</h1>
        <p></p>
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
                            <a href="missionDetail/<?php echo $mission->getId()?>" class="btn btn-dark btn-binoculars" data-bs-toggle="tooltip" data-bs-placement="top" title="Détail de la mission"><i class="bi bi-binoculars-fill"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>


                </tbody>
            </table>
        </div>
    </section>

</main>