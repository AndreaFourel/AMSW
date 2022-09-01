
<?php

    use Controller\IndexController;

    require_once ".././config/DotEnv.php";
    require_once ".././src/Entity/Mission.php";
    require_once ".././src/Entity/Country.php";
    require_once ".././src/Entity/Skill.php";
    require_once ".././src/Controller/MissionController.php";
    require_once ".././src/Controller/IndexController.php";
    require_once ".././src/Controller/CountryController.php";
    require_once ".././src/Controller/SkillController.php";

    // Instantiate DotEnv to get APP_PATH value used in header.php href and src's
    (new DotEnv(__DIR__ . '/../.env'))->load();
    $appRoot = getenv('APP_PATH');
    $title = "AMSW - Missions";
    $indexController = new IndexController();
    include ".././src/views/header.php";

    var_dump($_SERVER['REQUEST_URI']);
    var_dump($_SERVER["PHP_SELF"]);
    var_dump(dirname($_SERVER['PHP_SELF']));
    var_dump(str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']));
    var_dump(str_replace(dirname($_SERVER['REQUEST_URI']), '', $_SERVER['REQUEST_URI']));


    if($_SERVER['REQUEST_URI'] === ("/php/evalPhp/public/index.php")) {
       $indexController->missionsList();
   }

    if($_SERVER['REQUEST_URI'] === '/php/evalPhp/public/index.php/detailMissions') {
        echo 'hello';
        $indexController->missionsDetail();
    }



    include ".././src/views/footer.php";
