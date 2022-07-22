<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carousel Template · Bootstrap v5.1</title>
 <!-- Bootstrap core CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: rgb(248, 215, 114);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src=".\images\btnderosa.png" width="120" height="80" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nossa História</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Metodologia</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link">Contato</a> 
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="bd-plceholder-img d-flex align-items-center" style="background-color: #BAD9D0; height: 100%;">
            <img class="img-responsive" src="images/Screenshot 2022-04-12 160753.png" height="300px" style="margin: auto;">
          </div>
        </div>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Nosso espaço.</h1>
            <p>Venha conhecer! Matriculas abertas!.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Contato</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <div class="bd-placeholder-img rounded-circle" width="140" height="140">
          <img class="rounded-circle" style="border-style: solid; border-color: bisque;"src="data:image/png;base64,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" width="140" height="140">
        </div>
        <h2>Colônia de Férias</h2>
        <p>Confira as datas e programação.</p>
        <p><a class="btn btn-secondary" href="#">Ver Detalhes &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Contra Turno</h2>
        <p>lorem ipsum dolor sit amet.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Berçario</h2>
        <p>Lorem ipsum dolor sit amet.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
