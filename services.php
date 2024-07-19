<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Services - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Feuille de style unique à services.php -->
    <style>
        .service-card {
            margin: 20px;
        }
        .service-card h5 {
            font-size: 1.5rem;
        }
        .service-card p {
            font-size: 1rem;
        }
        .service-icon {
            font-size: 2rem;
            color: #007bff;
            margin-right: 10px;
        }
        .jumbotron {
            background: url('/assets/images/services.jpg') no-repeat center center;
            background-size: cover;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Ajout de la navb bar -->
    <?php include('html/nav.html'); ?>

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">Nos Services</h1>
            <p class="lead">Découvrez tous les services que nous proposons pour rendre votre visite inoubliable</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <?php
            // Services disponibles
            $services = [
                [
                    "name" => "Restaurant",
                    "description" => "Profitez d'un repas délicieux avec une vue magnifique sur le parc.",
                    "icon" => "fas fa-utensils"
                ],
                [
                    "name" => "Boutique de souvenirs",
                    "description" => "Trouvez des souvenirs uniques pour vous rappeler de votre visite.",
                    "icon" => "fas fa-gift"
                ],
                [
                    "name" => "Visites guidées",
                    "description" => "Participez à une visite guidée pour en apprendre davantage sur les animaux et leur habitat.",
                    "icon" => "fas fa-binoculars"
                ],
                [
                    "name" => "Aire de jeux pour enfants",
                    "description" => "Une aire de jeux sécurisée pour que les enfants puissent s'amuser.",
                    "icon" => "fas fa-child"
                ],
                [
                    "name" => "Location de poussettes",
                    "description" => "Louez des poussettes pour faciliter votre visite avec des enfants en bas âge.",
                    "icon" => "fas fa-baby-carriage"
                ],
                [
                    "name" => "Service de premiers secours",
                    "description" => "Des professionnels de santé sont disponibles pour vous aider en cas de besoin.",
                    "icon" => "fas fa-first-aid"
                ]
            ];

            // Afficher les services
            foreach ($services as $service) {
                echo '<div class="col-md-4">';
                echo '<div class="card service-card">';
                echo '<div class="card-body">';
                echo '<div class="d-flex align-items-center">';
                echo '<i class="' . $service['icon'] . ' service-icon"></i>';
                echo '<h5 class="card-title mb-0">' . $service['name'] . '</h5>';
                echo '</div>';
                echo '<p class="card-text mt-2">' . $service['description'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Ajout du footer -->
    <?php include('html/footer.html'); ?>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>