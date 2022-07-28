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
    <link rel="stylesheet" href="styles/main.css">

    <title>Document</title>
</head>
<body class="container-fluid">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top logo me-2">
                AMSW
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Missions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Détail des missions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <h1 class="my-5">Liste des missions</h1>
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
            <tr class="list-row">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>En cours</td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Détail de la mission">
                        <i class="bi bi-binoculars-fill"></i>
                    </button>
                </td>
            </tr>
            <tr class="list-row">
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>En cours</td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Détail de la mission">
                        <i class="bi bi-binoculars-fill"></i>
                    </button>
                </td>
            </tr>
            <tr class="list-row">
            <th scope="row">1</th>
            <td>Mark</td>
            <td>En cours</td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Détail de la mission">
                        <i class="bi bi-binoculars-fill"></i>
                    </button>
                </td>
            </tr>
            <tr class="list-row">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>En cours</td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Détail de la mission">
                        <i class="bi bi-binoculars-fill"></i>
                    </button>
                </td>
            </tr>
            <tr class="list-row">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>En cours</td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Détail de la mission">
                        <i class="bi bi-binoculars-fill"></i>
                    </button>
                </td>
            </tr>
            <tr class="list-row">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>En cours</td>
                <td>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Détail de la mission">
                        <i class="bi bi-binoculars-fill"></i>
                    </button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</main>
<footer class="bg-dark">
    <p>Ankh-Morpork Secret Watch</p>

</footer>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="scripts/script.js"></script>
</body>
</html>
