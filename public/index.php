
<?php

    use Controller\IndexController;
    use Routing\Router;
    use Routing\RouteNotFoundException;

    require_once ".././config/DotEnv.php";
    require_once ".././src/Entity/Mission.php";
    require_once ".././src/Entity/Country.php";
    require_once ".././src/Entity/Skill.php";
    require_once ".././src/Controller/MissionController.php";
    require_once ".././src/Controller/IndexController.php";
    require_once ".././src/Controller/CountryController.php";
    require_once ".././src/Controller/SkillController.php";
    require_once ".././src/Routing/Router.php";
    require_once ".././src/Routing/RouteNotFoundException.php";

    // Instantiate DotEnv to get APP_PATH value used in header.php href and src's
    (new DotEnv(__DIR__ . '/../.env'))->load();
    $appRoot = getenv('APP_PATH');
    $title = "AMSW - Missions";
    $indexController = new IndexController();
    include ".././src/views/header.php";

    var_dump($_SERVER['REQUEST_URI']);
    var_dump($_SERVER["PHP_SELF"]);
    var_dump(dirname($_SERVER['PHP_SELF']));





    //Instantiate Router
    $router = new Router();

//    if($requestUri === "/home/1") {
//       $indexController->missionsList();
//   }
//
//    if($requestUri === "/detailMissions") {
//
//        $indexController->missionsDetail();
//    }

    //Add my routes to $routes array
    $router->addRoute(
        'home_page',
        '/home',
        'GET',
        IndexController::class,
        'missionsList'
    );

    $router->addRoute(
        'detail_missions',
        '/detailMissions',
        'GET',
        IndexController::class,
        'missionsDetail'
    );


    //delete root directory from $_SERVER['REQUEST_URI']
    $requestUri =  str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);
    var_dump($requestUri);
    var_dump($_SERVER['REQUEST_METHOD']);

    //gives to router the REQUEST_URI and METHOD needed to find the route
    try {
        $router->execute($requestUri, $_SERVER['REQUEST_METHOD']);
    } catch (RouteNotFoundException $exception) {
        http_response_code(404);
        echo '<p>Page non trouvé</p>';
        echo '<p>' .$exception->getMessage() . '</p>';
    }

    include ".././src/views/footer.php";
