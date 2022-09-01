<?php

namespace Controller;

class IndexController
{
    public function missionsList()
    {

        $missionController = new MissionController();
        $missions = $missionController->getAll();
        include ".././src/views/home.php";
    }

    public function missionsDetail()
    {
        // Instantiate MissionController
        $missionController = new MissionController();
        $missions = $missionController->getAll();

        // Instantiate CountryController
        $countryController = new CountryController();

        // Instantiate SkillController
        $skillController = new SkillController();

        require_once ".././src/views/detailMission.php";


    }
}