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
            <!--
                <form action="/admin/categorias" class="d-flex" method="POST">
                    <input name="categoria" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    
                    <button class="btn btn-outline-success" type="submit"><i
                    class="fa-solid fa-magnifying-glass"></i></button>

                </form> -->
            <form class="d-flex" action="/produtos" method="POST">
              <input name="nome" class="form-control me-2" type="search" placeholder="Ex: Camiseta" aria-label="Search">
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
          <ul class="dropdown-menu dropdown-menu-dark">
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
          <button class="btn btn-secondary btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categoria
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <?php foreach ($categorias as $categoria) : ?>
              <form action="/produtos" method="post">
                <input type="hidden" name="categoriaID" value="<?= $categoria->id ?>">

                <li><button class="dropdown-item" type="submit"><?= $categoria->nome ?></button></li>
              </form>
            <?php endforeach; ?>
          </ul>
        </div>

      </div>
      <!--Fim Filtro de categoria-->

      <!--fim Filtro de categoria e barra de pesquisa-->


      <!--Inicio cards-->
      <div class="edit-card">
        <div class="row row-cols-1 row-cols-md-3 g-4 row-edit">
          <?php foreach ($produtos as $produto) : ?>
            <div class="col d-flex justify-content-center col-edit ">
              <div class="card card1 cartoes">
                <img src="../../public/img/moletomMS.jpg" class="card-img-top corpocards" alt="...">
                <div class="card-body ">
                  <h5 class="card-title cartao title-cards"><?= $produto->nome ?></h5>
                  <p class="card-text text-cards"><?= $produto->descricao ?></p>
                  <a href="/produto?id=<?= $produto->id ?>" class="btn btn-dark btnc">COMPRAR - R$<?= $produto->preco ?></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <!--fim cards-->

    </div>
    <!--fim cards-->

    <!--inicio paginação-->
    
    
  
    <div class="edit-paginacao">
      <nav aria-label="Page navigation" class="mt-3">
        <ul class="pagination">

         <li class="page-item <?= $page <= 1 ? "disabled" : "" ?>">
              <a class="page-link text-dark" href="?pagina=<?= $page > 1 ? $page - 1 : 1 ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
              </a>
          </li>

          <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++) : ?>
              <li class="page-item <?= $page_number == $page ? "active" : "" ?>">
                  <a class="page-link text-dark" href="?pagina=<?= $page_number ?>"><?= $page_number ?></a>
              </li>
          <?php endfor; ?>

          <li class="page-item <?= $page >= $total_pages ? "disabled" : "" ?>">
              <a class="page-link text-dark" href="?pagina=<?= $page < $total_pages ? $page + 1 : $total_pages ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
              </a>
          </li>

        </ul>
      </nav>
    </div>


    <!--fim paginação-->

</div>

    <?php include 'app/views/includes/footer.php' ?>
    
</body>

</html>