<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Bootstrap avec Effet Hover</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        header {
            background-color: #6c757d;
        }
        /* Liens */
        .nav-link {
            color: white;
            transition: all 0.5s ease;
            margin: 0 10px;
        }
        .nav-link:hover {
            background-color: #FFC107;
            color: black;
            box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        /* Boutons */
        .btn-log {
            border: none;
            color: white;
            transition: all 0.5s ease;
        }
        .btn-log:hover {
            background-color: #FFC107;
            color: black;
            box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.5);
        }

        .btn-outline-light {
            transition: all 0.5s ease;
        }
        .btn-outline-light:hover {
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="bg-secondary text-white">
    <header class="py-3 sticky-top">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="text-white fw-bold fs-5 text-decoration-none">SS</div>

            <!-- Navigation principale -->
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- Boutons de connexion ou profil -->
            <div>
                <a href="/auth" class="btn btn-log me-2">Connexion</a>
            </div>
        </div>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Utilisez la bonne version de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
