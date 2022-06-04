<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MonsterShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../../public/css/produtos.css" rel ="stylesheet">
    

</head>

<body>
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
                    <?php foreach ($categorias as $categoria) : ?>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><?=$categoria->nome?></a></li>
                      </ul>
                    <?php endforeach; ?>  
                  </div>




            </div>
           <!--Fim Filtro de categoria-->

    <!--fim Filtro de categoria e barra de pesquisa-->


    <!--Inicio cards-->
  <div class="edit-card">
    
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col d-flex justify-content-center">
          <div class="card  card1 cartoes2" style="width: 18rem;">
            <img src="../../public/img/moletomMS.jpg" class="card-img-top corpocards" alt="...">
            <div class="card-body ">
              <h5 class="card-title cartao title-cards">Moletom</h5>
              <p class="card-text text-cards">Moletom MonsterShop, o mais brabo do mercado!Garanta já o seu.<br>Tecido :100% Algodão.</p>
              <a href="#" class="btn btn-dark btnc">COMPRAR - R$79,99</a>
            </div> 
          </div>  
        </div>

        <div class="col d-flex justify-content-center">
          <div class="card  card1 cartoes2" style="width: 18rem;">
            <img src="../../public/img/multivitMS.jpg" class="card-img-top corpocards" alt="...">
            <div class="card-body">
              <h5 class="card-title cartao title-cards">Multivitamínico</h5>
              <p class="card-text text-cards">Com mais de 20 micronutrientes o Multivitaminico MonsterShop vai te dar aquele impulso no seu dia a dia.<br>Vitamina A<br>Vitamina B12<br>Vitamina C<br>Vitamina D<br>Vitamina E<br></p>
              <a href="#" class="btn btn-dark btnc">COMPRAR - R$20,00</a>
            </div> 
          </div>  
        </div>

        <div class="col d-flex justify-content-center">
          <div class="card  card1 cartoes2" style="width: 18rem;">
            <img src="../../public/img/luvaMS.jpg" class="card-img-top corpocards" alt="...">
            <div class="card-body">
              <h5 class="card-title cartao title-cards">Luvas</h5>
              <p class="card-text text-cards">Luvas pretas para musculação.<br>Composição em poliester e algodão.</p>
              <a href="#" class="btn btn-dark btnc">COMPRAR - R$12,00</a>
            </div> 
          </div>  
        </div>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>