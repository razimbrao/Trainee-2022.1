<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'app/views/includes/head.php' ?>
    <link rel="stylesheet" href="../../../public/css/dashboard.css">

    <title> Monster Shop - Dashboard</title>
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