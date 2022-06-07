<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'app/views/includes/head.php' ?>

  <link href="../../../public/css/login.css" rel="stylesheet">
  <title>MonsterShop</title>
</head>


<body>

  <?php include 'app/views/includes/navbar.php' ?>

  <div class="container">

    <!--inicio do formulario de login-->
    <div class="edit-login">
      <form>
        <div class="mb-3 edit-email">
          <label for="exampleInputEmail1" class="form-label">Email:</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Ex: nomeusuario@email.com</div>
        </div>
        <div class="mb-3 edit-senha">
          <label for="exampleInputPassword1" class="form-label">Senha:</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check edit-conectado">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Mantenha conectado</label>
        </div>
        <div class="editbotaosenha">
          <button type="submit" class="btn btn-danger">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=""> Esqueceu a senha?</a>
        </div>

        <div class="edit-cadastro">
          <br> Não tem uma conta? <a href="">Cadastre-se</a>
        </div>
      </form>
    </div>

    <!--fim do formulario de login-->

    <?php include 'app/views/includes/footer.php' ?>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>