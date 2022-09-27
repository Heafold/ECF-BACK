<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommerce</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produits">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0 d-inline-flex">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Recherche...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ms-3 d-inline-flex align-items-center" href="cart.html">
                    <i class="fa fa-shopping-cart me-2"></i> Panier
                    <span class="badge badge-light">3</span>
                </a>
            </form>

            <ul class="navbar-nav pl-3">
                <li class="nav-item">
                    <a class="nav-link" href="#">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inscription</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $category->name }}</h1>
        <p class="lead text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, veniam, eius aliquam quidem rem sunt nam quaerat facilis ex error placeat ipsa illo sed inventore soluta ipsum cumque atque ea?</p>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="/produits">Produits</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase">
                    <i class="fa fa-list"></i> Filtres</div>
                <form action="" method="post">
                    <ul class="list-group">
                        @foreach ($colors as $color)
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input type="checkbox" name="color[]" value="{{ $color->name }}" class="form-check-input" id="color-{{ $color->name }}">
                                    <label class="form-check-label" for="color-{{ $color->name }}">{{ $color->name }}</label>
                                </div>
                            </li>
                        @endforeach
                        <li class="list-group-item">
                            <button class="btn btn-primary w-100">Filtrer</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Catégories</div>
                <ul class="list-group category_block">
                    @foreach ($categories as $category)
                        <li class="list-group-item"><a href="{{route('category', $category->id)}}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Dernier produit</div>
                <div class="card-body">
                    <img class="img-fluid" src="{{ $last[0]->cover }}" />
                    <h5 class="card-title mt-3">{{ $last[0]->name }}</h5>
                    <p class="card-text">{{ $last[0]->description }}</p>

                    <div class="row">
                        <div class="col">
                            <p class="btn btn-danger w-100">{{ $last[0]->price }} &euro;</p>
                        </div>
                        <div class="col">
                            <a href="{{route('product', $last[0]->id)}}" class="btn btn-success w-100">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ $product->cover }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><a href="{{route('product', $product->id)}}" title="View Product">{{ $product->name }}</a></h4>
                                <p class="card-text">{{ $product->description }}</p>
                                <div class="row">
                                    <div class="col">
                                        <p class="btn btn-danger w-100">{{ $product->price }} &euro;</p>
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-success w-100">Ajouter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>A propos</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Informations</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Others links</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home ms-2"></i> My company</li>
                    <li><i class="fa fa-envelope ms-2"></i> email@example.com</li>
                    <li><i class="fa fa-phone ms-2"></i> + 33 12 14 15 16</li>
                    <li><i class="fa fa-print ms-2"></i> + 33 12 14 15 16</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
