<?php

namespace Controller;

use Routing\RouteNotFoundException;

class MissionDetailController
{

    public function missionSelect()
    {
        // Instantiate MissionController
        $missionController = new MissionController();
        $missions = $missionController->getAll();

        require_once ".././src/views/missionDetail.php";
    }

    /**
     * Gives the complete description of a requested mission
     *
     * @param int $id
     * @throws RouteNotFoundException if the requested {id} don't match any mission in database
     */
    public function missionDetail(int $id)
    {
        // Instantiate MissionController
        $missionController = new MissionController();
        $missions = $missionController->getAll();
        if($id <= count($missions)){
            $missionById = $missionController->getMissionById($id);

            // Instantiate CountryController
            $countryController = new CountryController();
            $countryId  = $missionById->getCountryId();
            $countryById = $countryController->getCountryById($countryId);

            // Instantiate SkillController
            $skillController = new SkillController();
            $skillId = $missionById->getSkillId();
            $skillById = $skillController->getSkillById($skillId);

            require_once ".././src/views/missionDetail.php";
        } else {
            throw new RouteNotFoundException($id);
        }

    }
}