<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2b94009ee2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../../public/css/dashboard.css">

    <title>Admin Monster - Dashboard</title>
</head>

<body>

    <main>
        <div class="container user-select-none">
            <div class="titulo title row justify-content-md-center">
                <img class="titulo-adm col-md-auto" src="../../../public/img/dashboard/titulo-admin.svg" alt="Titulo Administração">
                <img class="titulo-monster col-md-auto" src="../../../public/img/dashboard/titulo-monster.svg" alt="Titulo Monster">

            </div>
            <div class="content">
                <div class="btn-group-vertical botao-grupo">
                    <a href="/admin/usuarios" class="btn btn-primary btn-dark btn-lg botao" aria-current="page">Usuários</a>
                    <a href="/admin/produtos" class="btn btn-primary btn-dark btn-lg botao">Produtos</a>
                    <a href="/admin/categorias" class="btn btn-primary btn-dark btn-lg botao">Categorias</a>
                </div>
                <a href="/home" class="btn-sm btn-primary btn-dark botao logout">Logout</a>
            </div>
        </div>
    </main>
</body>

</html>