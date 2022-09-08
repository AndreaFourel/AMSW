
<?php

    use Controller\IndexController;
    use Controller\MissionDetailController;
    use Routing\Router;
    use Routing\RouteNotFoundException;
    use Controller\AdminController;

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


    //Instantiate Router
    $router = new Router();

    //Add routes to $routes array with the right controller and method
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
        "/missionDetail/{id}",
        'GET',
        MissionDetailController::class,
        'missionDetail'
    );
    $router->addRoute(
        'mission_detail',
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

    //gives router the REQUEST_URI and METHOD to find the route
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
