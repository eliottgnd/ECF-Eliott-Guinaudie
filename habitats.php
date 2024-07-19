<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Habitats - Zoo</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Feuille de style propre à habitats.php -->
    <style> 
        .card {
            margin: 10px;
            transition: width 0.5s ease, height 0.5s ease;
        }
        .card-img-top {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        .animal-details {
            display: none;
            margin-top: 10px;
        }
        .animal-details img {
            height: 50px; 
            margin-right: 5px;
        }
        .toggle-text {
            margin-top: 10px;
        }
        .card.expanded {
            width: 100%; 
        }
        .jumbotron {
            background: url('/assets/images/habitats.jpg') no-repeat center center;
            background-size: cover;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Ajout de la nav bar -->
    <?php include('html/nav.html'); ?>

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">Nos Habitats</h1>
            <p class="lead">Découvrez tous les habitats dans lesquels vous trouverez nos animaux</p>
        </div>
    </div>

        <!-- Conteneur des cartes -->
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <img src="assets/images/habitats1.jpg" class="card-img-top" alt="Aviary Tropical">
                    <div class="card-body">
                        <h5 class="card-title">Aviary Tropical</h5>
                        <div class="animal-details">
                            <p>Aviary Tropical recrée une dense végétation avec des arbres majestueux et des cascades. Les visiteurs peuvent observer des espèces exotiques telles que des oiseaux colorés, des singes agiles et des papillons scintillants.</p>
                            <ul>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Coco">Coco</a></li>
                                <li><strong>Race:</strong> Ara macao</li>
                                <li><strong>Images:</strong> <img src="assets/images/coco.jpg" alt="Coco"> </li>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Rio">Rio</a></li>
                                <li><strong>Race:</strong> Toucan toco</li>
                                <li><strong>Images:</strong> <img src="assets/images/rio.jpg" alt="Rio"> </li>
                            </ul>
                        </div>
                        <button class="btn btn-primary toggle-text">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <img src="assets/images/habitats2.jpg" class="card-img-top" alt="Étang des Hippopotames">
                    <div class="card-body">
                        <h5 class="card-title">Étang des Hippopotames</h5>
                        <div class="animal-details">
                            <p>L'Étang des Hippopotames recrée un environnement aquatique avec de vastes étendues d'eau, des arbres et des berges. Cet habitat est parfait pour observer les hippopotames dans leur milieu naturel, nageant et se prélassant dans l'eau.</p>
                            <ul>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Hippo">Hippo</a></li>
                                <li><strong>Race:</strong> Hippopotame</li>
                                <li><strong>Images:</strong> <img src="assets/images/hippo.jpg" alt="Hippo"> </li>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Bubbles">Bubbles</a></li>
                                <li><strong>Race:</strong> Hippopotame pygmée</li>
                                <li><strong>Images:</strong> <img src="assets/images/bubbles.jpg" alt="Bubbles"> </li>
                            </ul>
                        </div>
                        <button class="btn btn-primary toggle-text">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <img src="assets/images/habitats3.jpg" class="card-img-top" alt="Forêt Tropicale">
                    <div class="card-body">
                        <h5 class="card-title">Forêt Tropicale</h5>
                        <div class="animal-details">
                            <p>La Forêt Tropicale recrée une dense végétation avec des arbres majestueux, des cascades et des lianes. Cet habitat abrite des espèces exotiques telles que des oiseaux colorés, des singes agiles et des papillons scintillants. Un écosystème vibrant qui permet aux visiteurs de découvrir la biodiversité incroyable des forêts tropicales.</p>
                            <ul>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Simba">Simba</a></li>
                                <li><strong>Race:</strong> Singe hurleur</li>
                                <li><strong>Images:</strong> <img src="assets/images/simba.jpg" alt="Simba"> </li>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Luna">Luna</a></li>
                                <li><strong>Race:</strong> Papillon morpho</li>
                                <li><strong>Images:</strong> <img src="assets/images/luna.jpg" alt="Luna"> </li>
                            </ul>
                        </div>
                        <button class="btn btn-primary toggle-text">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <img src="assets/images/habitats4.jpg" class="card-img-top" alt="Grotte des Chauves-souris">
                    <div class="card-body">
                        <h5 class="card-title">Grotte des Chauves-souris</h5>
                        <div class="animal-details">
                            <p>La Grotte des Chauves-souris simule un environnement sombre et humide avec des stalactites et stalagmites. Les visiteurs peuvent observer les chauves-souris en plein vol, se reposant et interagissant dans leur habitat naturel.</p>
                            <ul>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Shadow">Shadow</a></li>
                                <li><strong>Race:</strong> Chauve-souris des fruits</li>
                                <li><strong>Images:</strong> <img src="assets/images/shadow.jpg" alt="Shadow"> </li>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Night">Night</a></li>
                                <li><strong>Race:</strong> Chauve-souris vampire</li>
                                <li><strong>Images:</strong> <img src="assets/images/night.jpg" alt="Night"> </li>
                            </ul>
                        </div>
                        <button class="btn btn-primary toggle-text">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <img src="assets/images/habitats5.jpg" class="card-img-top" alt="Plateau des Éléphants">
                    <div class="card-body">
                        <h5 class="card-title">Plateau des Éléphants</h5>
                        <div class="animal-details">
                            <p>Le Plateau des Éléphants recrée un environnement montagneux avec des plateaux élevés, des arbres imposants et des brumes matinales. Cet habitat est conçu pour permettre aux éléphants de se déplacer librement et de profiter d'un paysage naturel spectaculaire. Les visiteurs peuvent observer ces majestueux animaux interagir avec leur environnement, se nourrir et se déplacer sur les hauteurs du plateau.</p>
                            <ul>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Dumbo">Dumbo</a></li>
                                <li><strong>Race:</strong> Éléphant d'Afrique</li>
                                <li><strong>Images:</strong> <img src="assets/images/dumbo.jpg" alt="Dumbo"> </li>
                                <li><strong>Prénom:</strong> <a href="php/animal.php?name=Daisy">Daisy</a></li>
                                <li><strong>Race:</strong> Éléphant d'Asie</li>
                                <li><strong>Images:</strong> <img src="assets/images/daisy.jpg" alt="Daisy"> </li>
                            </ul>
                        </div>
                        <button class="btn btn-primary toggle-text">Voir plus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS et dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Ajout du footer -->
    <?php include('html/footer.html'); ?>

    <!-- Ajout du code JS pour que les cards s'agrandissent au clic pour afficher plus de texte -->
    <script> 
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-text');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.card');
                    const details = card.querySelectorAll('.animal-details');
                    details.forEach(detail => {
                        if (detail.style.display === 'none' || detail.style.display === '') {
                            detail.style.display = 'block';
                        } else {
                            detail.style.display = 'none';
                        }
                    });

                    if (card.classList.contains('expanded')) {
                        card.classList.remove('expanded');
                        this.textContent = 'Voir plus';
                    } else {
                        card.classList.add('expanded');
                        this.textContent = 'Voir moins';
                    }
                });
            });
        });
    </script>
</body>
</html>