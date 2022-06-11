<!DOCTYPE html>
<html lang="pt-br">

<head>
<?php include 'app/views/includes/head.php' ?>

  <link rel="stylesheet" href="../../../public/css/home.css">

  <title>Monster Shop - Home</title>

</head>


<body>

  <?php include 'app/views/includes/navbar.php' ?>

  <div class="img-fundo">
    <img class="w-100" src="../../../public/img/img_home/fundo6.jpg" height="80%" width="100%" alt="MonsterShop logo">
  </div>

  <div class="container cont-custom">

    <div id="carouselExampleCaptions" class="carousel slide carousel-home" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../../../public/img/img_home/carouselWhey.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Whey Protein MonsterShop</h5>
            <p></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../../../public/img/img_home/carouselCamisa.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Camiseta MonsterShop</h5>
            <p></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../../../public/img/img_home/carouselCreatina.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Creatina MonsterShop</h5>
            <p></p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">

      <?php foreach ($produtos as $produto) : ?>
        <div class="col d-flex justify-content-center">
          <div class="card  card1 cartoes2" style="width: 18rem;">
            <img src="../../../public/img/img_home/moletomMS.jpg" class="card-img-top corpocards" alt="...">
            <div class="card-body ">
              <h5 class="card-title cartao title-cards"><?= $produto->nome ?></h5>
              <p class="card-text text-cards"><?= $produto->descricao ?></p>
              <a href="#" class="btn btn-primary btnc">COMPRAR</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>


    <div class="linksimg">
      <a class="img-qs " href="quem-somos"><img class="social-img" src="../../../public/img/img_home/quemSomos.jpg" width="400" height="100" alt="Link para página de quem somos"></a>

      <a class="img-ct" href="contato"><img class="social-img" src="../../../public/img/img_home//contato.jpg" width="400" height="100" alt="Link para página de contatos"></a>

    </div>

  </div>

  <?php include 'app/views/includes/footer.php' ?>



</body>


</html>