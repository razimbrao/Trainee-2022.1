<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'app/views/includes/head.php' ?>

  <link href="../../../public/css/login.css" rel="stylesheet">
  <title>Admin Monster - Login</title>
</head>


<body>

  <?php include 'app/views/includes/navbar.php' ?>

  <div class="container">

  <?php if(isset($_SESSION['loginInvalido']) && !empty($_SESSION['loginInvalido'])): ?>
        <center>
          <div class="alert alert-danger edit-msg" role="alert">
              <?= $_SESSION['loginInvalido']; ?>
          </div>
        </center>
           <?php unset($_SESSION['loginInvalido']); ?>
     <?php endif;?>
     
     <!--inicio do formulario de login-->
     <div class="edit-login">
       
       
       <form action = "/admin/login/validacao" method = "POST">
         <div class="mb-3 edit-email">
           <label for="exampleInputEmail1" class="form-label">Email:</label>
           <input type="email" class="form-control" name = "email" id="email" aria-describedby="emailHelp">
           <div id="emailHelp" class="form-text">Ex: nomeusuario@email.com</div>
          </div>
            <div class="mb-3 edit-senha">
              <label for="exampleInputPassword1" class="form-label">Senha:</label>
              <input type="password" class="form-control"  name = "senha"  id="senha">
            </div>
            <div class="mb-3 form-check edit-conectado">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Mantenha conectado</label>
            </div>
            <div class="editbotaosenha">
                <button type="submit"  name = "entrar" id="entrar" class="btn btn-danger">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">  Esqueceu a senha?</a>
              </div>

            <div class="edit-cadastro">
              <br> Não tem uma conta? <a href="/admin/usuarios">Cadastre-se</a>
            </div>
        </form>
      </div>
      
      <!--fim do formulario de login-->
      
    <?php include 'app/views/includes/footer.php' ?>

  </div>

</body>

</html>
