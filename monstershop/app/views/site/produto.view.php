<!DOCTYPE html>
<html lang="pt-Br">

<head>
  <?php include 'app/views/includes/head.php' ?>

  <link rel="stylesheet" type="text/css" href="../../../public/css/front-produto.css" media="screen" />

  <title><?= $produto[0]->nome ?></title>
</head>


<body>

  <?php include 'app/views/includes/navbar.php' ?>

  <div class="container editContainer">
    <div class="row">
      <div class="col-sm img-produto-principal">


        <!-- Inicio Carousel -->
        <div id="carouselExampleControls" class="carousel slide carrosel-produto-principal carousel-dark" data-ride="carousel">

          <div class="carousel-inner">
            <?php for ($i = 0; $i < count($produto[0]->imagens); $i++) : ?>
              <div class="carousel-item <?php echo ($i === 0 ? ' active' : ''); ?>">
                <img src="../../../public/img/adm-produtos/produtos/<?= $produto[0]->imagens[$i]->nome_imagem ?>" class="d-block w-100 imagem-teste" alt="Imagem do produto">
              </div>
            <?php endfor; ?>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>

        </div>

        <!-- Fim Carousel -->

      </div>
      <div class="col-sm opcoes-de-compra">
        <h1><?= $produto[0]->nome ?></h1>
        <h2><?= $produtoCategoria[0]->nome ?></h2>
        <hr>

        <h3>Quantidade:</h3>
        <div class="btn-quantidade">
          <button type="button" class="btn btn-danger diminuir-quantidade">-</button>
          <input class="form-control input-qtde" type="text" placeholder="1" readonly>
          <button type="button" class="btn btn-success aumentar-quantidade">+</button>
        </div>
        
        <?php if($produto[0]->categoriaID === 1) :?>
        <h3>Tamanho:</h3>
        <div class="btn-group btn-tamanho" role="group" aria-label="Basic radio toggle button group">
          <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio1">PP</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio2">P</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="on">
          <label class="btn btn-outline-primary" for="btnradio3">M</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio4">G</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
          <label class="btn btn-outline-primary" for="btnradio5">GG</label>
        </div>
        <?php endif; ?>

      </div>
      <div class="col-sm opcoes-de-compra2">
        <h3>Por: R$<?= number_format($produto[0]->preco, 2, ',', '') ?></h3>


        <hr>

        <h3>Formas de pagamento:</h3>

        <div class="form-check formas-de-pagamento">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
          <label class="form-check-label" for="flexRadioDefault1">
            Pix
          </label>
        </div>
        <div class="form-check formas-de-pagamento">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
          <label class="form-check-label" for="flexRadioDefault2">
            Boleto
          </label>
        </div>
        <div class="form-check formas-de-pagamento">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked>
          <label class="form-check-label" for="flexRadioDefault3">
            Cartão de crédito
          </label>
        </div>

        <hr>

        <h3>CEP:</h3>
        <div class="input-group input-cep">
          <input type="text" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="____-__">
          <button type="button" class="btn btn-outline-secondary">Calcular</button>
          <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-opcoes">
            <li><a class="dropdown-item" href="#">Sedex</a></li>
            <li><a class="dropdown-item" href="#">Express</a></li>
          </ul>
        </div>
        <hr>
        <div class="d-grid gap-2 btn-comprar">
          <button class="btn btn-primary" type="button">Comprar</button>
        </div>
      </div>
    </div>
  </div>

  <!--informacoes do Produto-->
  <div class="accordion informacoes-produto" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingInfo">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo">
          Informações do produto
        </button>
      </h2>
      <div id="collapseInfo" class="accordion-collapse collapse show" aria-labelledby="headingInfo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong><?= $produto[0]->nome ?>: </strong><?= $produto[0]->descricao ?>
        </div>
      </div>
    </div>
  </div>

  <!--Avaliação do Produto-->
  <div class="accordion avaliacoes-produto" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Avaliações
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">

        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Avaliação mais relevante
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="corpo-avaliacao">
                <h4>Zezinho Maromba</h4>
                <p>Produto de excelente qualidade e em preço acessível</p>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Última avaliação
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="corpo-avaliacao">
                <h4>Gustavirus</h4>
                <p>Ótimas paradinhas!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Outros produtos da mesma categoria-->
  <div class="recomendacoes">
    <h1>Você também pode gostar de:</h1>
    <div class="col d-flex lista-recomendacoes">
      <div class="card  card1 cartoes2" style="width: 18rem;">
        <img src="../../../public/img/camisetaMS.jpg" class="card-img-top corpocards" alt="...">
        <div class="card-body">
          <h5 class="card-title cartao title-cards">Camiseta</h5>
          <p class="card-text text-cards">Camiseta preta MonsterShop.</p>
          <a href="#" class="btn btn-primary btnc">Ver</a>
        </div>
      </div>
      <div class="card  card1 cartoes2" style="width: 18rem;">
        <img src="../../../public/img/moletomMS.jpg" class="card-img-top corpocards" alt="...">
        <div class="card-body">
          <h5 class="card-title cartao title-cards">Camiseta</h5>
          <p class="card-text text-cards">Camiseta preta MonsterShop.</p>
          <a href="#" class="btn btn-primary btnc">Ver</a>
        </div>
      </div>
      <div class="card  card1 cartoes2" style="width: 18rem;">
        <img src="../../../public/img/camisetaMS.jpg" class="card-img-top corpocards" alt="...">
        <div class="card-body">
          <h5 class="card-title cartao title-cards">Camiseta</h5>
          <p class="card-text text-cards">Camiseta preta MonsterShop.</p>
          <a href="#" class="btn btn-primary btnc">Ver</a>
        </div>
      </div>
    </div>
  </div>



  <?php include 'app/views/includes/footer.php' ?>


</body>

</html>