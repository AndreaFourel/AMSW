<?php

namespace Controller;

class IndexController
{
    public function homePage()
    {
        include ".././src/views/home.php";
    }

    public function missionList()
    {
        $missionController = new MissionController();
        $missions = $missionController->getAll();
        include ".././src/views/missionList.php";
    }




}