<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
        </style>

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">
    </head>
    <body>
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Ecommerce</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Recherche" aria-label="Recherche">
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">Déconnexion</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="dashboard.html">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin-list.html">
                                    <span data-feather="file"></span>
                                    Produits
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">
                                    <span data-feather="file"></span>
                                    Retour
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>

                    <div>
                        <form method="post" class="w-1/2 mx-auto" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="mb-3">
                                <label class="block mb-1" for="name">Nom</label>
                                <input class="w-full" type="text" name="name" id="name">
                                @error('name')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <div class="mb-3">
                                <label class="block mb-1" for="description">Description</label>
                                <textarea class="w-full" name="description" id="description"></textarea>
                                @error('description')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="color_id">Couleur</label>
                                <select class="form-select" id="color_id">
                                    <option selected>Choisir</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="categories_id">Catégorie</label>
                                <select class="form-select" id="categories_id">
                                    <option selected>Choisir</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div class="mb-3">
                                <label class="block mb-1" for="price">Prix</label>
                                <input class="w-full" type="number" name="price" id="price">
                                @error('price')
                                <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <div class="mb-3">
                                <label class="block mb-1" for="cover">Image</label>
                                <input class="w-full" type="file" name="cover" id="cover" value="">
                                
                            </div>
                    
                            
                            <button>Ajouter</button>
                        </form>
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    </body>
</html>
