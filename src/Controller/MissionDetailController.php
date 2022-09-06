<?php

namespace Controller;

class MissionDetailController
{

    public function missionSelect()
    {
        // Instantiate MissionController
        $missionController = new MissionController();
        $missions = $missionController->getAll();

        require_once ".././src/views/missionDetail.php";
    }

    public function missionDetail(int $id)
    {
        // Instantiate MissionController
        $missionController = new MissionController();
        $missions = $missionController->getAll();
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
    }
}