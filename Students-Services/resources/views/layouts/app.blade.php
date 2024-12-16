<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudEase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #6c757d;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #FFC107;
        }

        .nav-link {
            color: white;
            transition: all 0.5s ease;
            margin: 0 5px;
        }

        .nav-link:hover {
            background-color: #FFC107;
            color: black;
            box-shadow: inset 4px 4px 6px rgba(0, 0, 0, 0.5);
            border-radius: 7px;
        }

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

        @media screen and (max-width: 991px) {
            .navbar-collapse {
                max-height: 80vh;
                overflow-y: auto;
            }

            .navbar-nav {
                align-items: center;
                text-align: center;
                margin-top: 15px;
            }

            .nav-link {
                margin: 10px 0;
                width: 100%;
            }

            .auth-buttons {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 15px;
            }

            .auth-buttons .btn {
                margin: 10px 0;
                width: 200px;
            }
        }

        @media screen and (max-width: 576px) {
            .navbar-brand {
                font-size: 1.2rem;
            }

            .nav-link {
                font-size: 0.9rem;
            }

            .auth-buttons .btn {
                width: 150px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body class="bg-light text-white">
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark py-3">
            <div class="container">
                <a class="navbar-brand" href="/">StudEase</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/ads">Annonces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="/profile">Profil</a>
                        </li>
                    </ul>

                    <div class="auth-buttons">
                        @auth
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-log me-2">Déconnexion</button>
                            </form>
                        @else
                            <a href="/auth" class="btn btn-log me-2">Connexion</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>