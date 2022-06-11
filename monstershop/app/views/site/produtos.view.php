<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'app/views/includes/head.php' ?>

  <link href="../../../public/css/produtos.css" rel="stylesheet">

  <title>Monster Shop - Produtos</title>
</head>

<body>

  <?php include 'app/views/includes/navbar.php' ?>

  <div class="container">

    <!-- Inicio Filtro de categoria e barra de pesquisa-->
    <div class="edit-categoria-pesquisa">

      <!--Inicio da barra de pesquisa-->
      <div class="edit-pesquisa">
        <nav class="navbar navbar-dark bg-dark">
          <div class="container-fluid">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Ex: Camiseta" aria-label="Search">
              <button class="btn btn-outline-danger" type="submit">Buscar</button>
            </form>
          </div>
        </nav>
      </div>
      <!--Fim da barra de pesquisa-->

      <!--Inicio Filtro de categoria-->
      <div class="edit-filtro">
        <div class="btn-grou">
          <button class="btn btn-secondary btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produtos
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Camiseta Monstershop</a></li>
            <li><a class="dropdown-item" href="#">Coqueteleira Monstershop</a></li>
            <li><a class="dropdown-item" href="#">Creatina</a></li>
            <li><a class="dropdown-item" href="#">Pasta de amendoim</a></li>
            <li><a class="dropdown-item" href="#">Multivitaminico</a></li>
            <li><a class="dropdown-item" href="#">Paradinhas</a></li>
            <li><a class="dropdown-item" href="#">Whey Protein</a></li>
            <li><a class="dropdown-item" href="#">Luva Monstershop</a></li>
            <li><a class="dropdown-item" href="#">Moletom Monstershop</a></li>
          </ul>
        </div>
        <div class="btn-group">
          <button class="btn btn-secondary btn-dark" type="button">
            Categoria
          </button>
          <button type="button" class="btn btn-dark btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Roupas</a></li>
            <li><a class="dropdown-item" href="#">Equipamentos</a></li>
            <li><a class="dropdown-item" href="#">Suplementos</a></li>
          </ul>
        </div>
      </div>
      <!--Fim Filtro de categoria-->

      <!--fim Filtro de categoria e barra de pesquisa-->


      <!--Inicio cards-->


      <div class="edit-card">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($produtos as $produto) : ?>
            <div class="col d-flex justify-content-center">
              <div class="card card1 cartoes">
                <img src="../../../public/img/moletomMS.jpg" class="card-img-top corpocards" alt="...">
                <div class="card-body ">
                  <h5 class="card-title cartao title-cards"><?= $produto->nome ?></h5>
                  <p class="card-text text-cards"><?= $produto->descricao ?></p>
                  <a href="#" class="btn btn-dark btnc">COMPRAR - R$<?= $produto->preco ?></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <!--fim cards-->

      <!--inicio paginação-->
      <div class="edit-paginacao">
        <nav aria-label="Page navigation example ">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">Proximo</a></li>
          </ul>
        </nav>
      </div>
      <!--fim paginação-->

    </div>

    <?php include 'app/views/includes/footer.php' ?>



</body>

</html>