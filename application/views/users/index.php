<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        @font-face {
            font-family: 'poppinslight';
            src: url('<?= base_url() ?>/assets/css/poppins/Poppins-Light.ttf') format('ttf'),
                font-weight: 300;
            font-style: normal;

        }

        body {
            font-family: "poppinslight";
            font-size: 14px;
            line-height: 1.5;
            color: #24292e;
        }
    </style>

    <title><?= $title; ?></title>
</head>

<body>
    <section class="header">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav mx-auto">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Features</a>
                        <a class="nav-item nav-link" href="#">Pricing</a>
                        <a class="nav-item nav-link disabled" href="#">Disabled</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Jumbotron  -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Fluid jumbotron</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
        </div>

        <p class="text1"><strong>Bisnis baju murah</strong> menjadi produk yang gaada matinya untuk dijadikan bisnis online,
            kenapa demikian ? Karena baju menjadi kewajiban bagi manusia yang masih mempunyai urat kemaluan. Coba deh bayangin,
            ada berapa juta umat manusia di Indonesia ini ? mungkin bukan lagi jutaan, tapi ratusan juta umat manusia yang hanya
            ada di Indonesia saja. Diangka ratusan juta tersebut, mereka pasti membutuhkan yang namanya BAJU ya kan ? Dan inilah
            yang bisa anda jadikan peluang usaha untuk mendapatkan penghasilan setiap harinya. <strong><em>Selama produk itu
                    dibutuhkan, maka disitulah ada peluang untuk anda mendapatkan penghasilan.</em></strong></p>
    </section>


    <!-- Forms order paketan -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card border-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Informasi Kami :</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>