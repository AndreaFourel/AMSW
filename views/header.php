<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $appRoot ?>/styles/main.css">

    <title><?php echo $title ?></title>
</head>
<body class="container-fluid">
    <header>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?= $appRoot ?>/images/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top logo me-2">
                    AMSW
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    $ariaCurrent = '';

                    function activePage($current_page){
                        $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
                        $url = end($url_array);
                        if($current_page === $url){
                            echo 'active'; //class name in css
                            $ariaCurrent = 'aria-current="page"';
                        }
                    }
                    ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php activePage('index.php');?>" <?php echo $ariaCurrent?> href="<?= $appRoot ?>/index.php">Missions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php activePage('detailMission.php');?>" <?php echo $ariaCurrent?> href="<?= $appRoot ?>/views/detailMission.php">Détail des missions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php activePage('admin.php');?>" <?php echo $ariaCurrent?> href="<?= $appRoot ?>/views/admin.php" >Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

