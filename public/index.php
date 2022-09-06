
<?php

    use Controller\IndexController;
    use Controller\MissionDetailController;
    use Routing\Router;
    use Routing\RouteNotFoundException;
    use Controller\AdminController;

//    require_once ".././config/DotEnv.php";
//    require_once ".././src/Entity/Mission.php";
//    require_once ".././src/Entity/Country.php";
//    require_once ".././src/Entity/Skill.php";
//    require_once ".././src/Controller/MissionController.php";
//    require_once ".././src/Controller/MissionDetailController.php";
//    require_once ".././src/Controller/IndexController.php";
//    require_once ".././src/Controller/AdminController.php";
//    require_once ".././src/Controller/CountryController.php";
//    require_once ".././src/Controller/SkillController.php";
//    require_once ".././src/Routing/Router.php";
//    require_once ".././src/Routing/RouteNotFoundException.php";

    function loadClass(string $class){
        if ($class === "DotEnv"){
            require_once ".././config/$class.php";
        } elseif (str_contains($class, "Controller")){
            require_once ".././src/$class.php";
        } else {
            require_once ".././src/$class.php";
        }
    }

    spl_autoload_register("loadClass");

    // Instantiate DotEnv to get APP_PATH value used in header.php href and src's
    (new DotEnv(__DIR__ . '/../.env'))->load();
    $appRoot = getenv('APP_PATH');
    $title = "AMSW - Missions";
    $indexController = new IndexController();
    require_once ".././src/views/header.php";

//    var_dump($_SERVER['REQUEST_URI']);
//    var_dump($_SERVER["PHP_SELF"]);
//    var_dump(dirname($_SERVER['PHP_SELF']));

    //Instantiate Router
    $router = new Router();

    //Add routes to $routes array
    $router->addRoute(
        'home_page',
        '/',
        'GET',
        IndexController::class,
        'homePage'
    );
    $router->addRoute(
        'home_page',
        '/home',
        'GET',
        IndexController::class,
        'homePage'
    );
    $router->addRoute(
        'mission_list',
        '/missionList',
        'GET',
        IndexController::class,
        'missionList'
    );
    $router->addRoute(
        'mission_detail',
        '/missionDetail',
        'GET',
        MissionDetailController::class,
        'missionSelect'
    );
    $router->addRoute(
        'mission_detail_id',
        "/missionDetail/1",
        'GET',
        MissionDetailController::class,
        'missionDetail'
    );
    $router->addRoute(
        'mission_detail_id',
        '/missionDetail',
        'POST',
        MissionDetailController::class,
        'missionDetail'
    );
    $router->addRoute(
        'admin_page',
        '/admin',
        'GET',
        AdminController::class,
        'adminPage'
    );



    //delete root directory from $_SERVER['REQUEST_URI']
    $requestUri =  str_replace(dirname($_SERVER['PHP_SELF']), '', $_SERVER['REQUEST_URI']);
//    var_dump($requestUri);
//    var_dump($_SERVER['REQUEST_METHOD']);

    //gives to router the REQUEST_URI and METHOD to find the route
    try {
        $router->execute($requestUri, $_SERVER['REQUEST_METHOD']);
    } catch (RouteNotFoundException $exception) {
        http_response_code(404);
        echo '<p>Page non trouvé</p>';
        echo '<p>' .$exception->getMessage() . '</p>';
    } catch (ReflectionException $e) {
        echo $e->getMessage();
    }

    require_once ".././src/views/footer.php";
