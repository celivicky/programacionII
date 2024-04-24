<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 2){
    header('location: ../login.php');
$id=$_SESSION['id'];
  }
?>


<?php if(isset($_SESSION['id'])) { ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema help desk</title>

  <!-- 
    - favicon
  -->
   <link rel="shortcut icon" href="../../backend/img/ae.png" type="image/png">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="../../backend/css/admin.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- 
    - material icon link
  -->
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />

</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="escritorio.php" class="logo">J.Shalom</a>
      </h1>

      <button class="menu-toggle-btn icon-box" data-menu-toggle-btn aria-label="Toggle Menu">
        <span class="material-symbols-rounded  icon">menu</span>
      </button>

      <nav class="navbar">
        <div class="container">

          <ul class="navbar-list">

            <li>
              <a href="escritorio.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">grid_view</span>

                <span>Home</span>
              </a>
            </li>
            
            <li>
              <a href="tareas.php" class="navbar-link active icon-box">
                <span class="material-symbols-rounded  icon">list</span>

                <span>Tareas</span>
              </a>
            </li>

            <li>
              <a href="../salir.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">power_settings_new</span>

                <span>Cerrar sesión</span>
              </a>
            </li>

          </ul>

          <ul class="user-action-list">
            <li>
              <a href="#" class="header-profile">

                <figure class="profile-avatar">
                  <img src="../../backend/img/6460328.png" alt="Elizabeth Foster" width="32" height="32">
                </figure>

                <div>
                  <p class="profile-title"><?php echo $_SESSION['nombre']; ?></p>

                  <?php 
                    if ($_SESSION['rol']=='1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Miembro</p>';
                    } 
               ?>
                </div>

              </a>
            </li>

          </ul>

        </div>
      </nav>

    </div>
  </header>

  <main>
    <article class="container article">

      <h2 class="h2 article-title">Hi <?php echo $_SESSION['nombre']; ?></h2>

      <p class="article-subtitle">Bienvenido a nuestro sistema</p>

      <!-- 
        - #HOME
      -->

      <section class="home">

        <div class="card profile-card">
          <div class="profile-card-wrapper">

            <figure class="card-avatar">
              <img src="../../backend/img/reere.png" alt="admin" width="48" height="48">
            </figure>

            <div>
              <p class="card-title"><?php echo $_SESSION['nombre']; ?></p>

              <?php 
                    if ($_SESSION['rol']=='1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Miembro</p>';
                    } 
               ?>
              
            </div>

          </div>

          <ul class="contact-list">

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">mail</span>

                <p class="text"><?php echo $_SESSION['correo']; ?></p>
              </a>
            </li>

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">person</span>

                <p class="text"><?php echo $_SESSION['username']; ?></p>
              </a>
            </li>

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">badge</span>

                <p class="text"><?php echo $_SESSION['nombre']; ?></p>
              </a>
            </li>


            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">tenancy</span>

                <?php 
                    if ($_SESSION['rol']=='1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Miembro</p>';
                    } 
               ?>
              </a>
            </li>

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">scatter_plot</span>

                <?php 
                    if ($_SESSION['state']=='1') {
                      echo ' <p class="card-subtitle">Activo</p>';  
                    } elseif ($_SESSION['rol']=='2') {
                      echo ' <p class="card-subtitle">Inactivo</p>';
                    } 
               ?>
              </a>
            </li>

          </ul>
        </div>

        <div class="card-wrapper">

          <div class="card task-card">

            <div class="card-icon icon-box green">
              <span class="material-symbols-rounded  icon">task_alt</span>
            </div>

            <div>
              <?php 
                  require_once('../../backend/config/Conexion.php');
                    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 1";
                    $result = $connect->query($sql); //$pdo sería el objeto conexión
                    $total = $result->fetchColumn();

              ?>
              <data class="card-data" value="<?php echo  $total; ?>"><?php echo  $total; ?></data>

              <p class="card-text">Tareas atendidas</p>
            </div>

          </div>

          <div class="card task-card">

            <div class="card-icon icon-box red">
              <span class="material-symbols-rounded  icon">sort</span>
            </div>

            <div>
              <?php 
                
                    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 0";
                    $result = $connect->query($sql); //$pdo sería el objeto conexión
                    $total = $result->fetchColumn();

              ?>
              <data class="card-data" value="<?php echo  $total; ?>"><?php echo  $total; ?></data>

              <p class="card-text">Tareas pendientes</p>
            </div>

          </div>

        </div>

        <div class="card revenue-card">

          <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
            <span class="material-symbols-rounded  icon">more_horiz</span>
          </button>

          <ul class="ctx-menu">
            <li class="ctx-item">
              <button class="ctx-menu-btn icon-box">
                <span class="material-symbols-rounded  icon" aria-hidden="true">cached</span>

                <span class="ctx-menu-text">Refresh</span>
              </button>
            </li>

          </ul>

          <p class="card-title">Tareas</p>
<?php      
      $sql = "SELECT COUNT(*) total FROM tarea";
      $result = $connect->query($sql); //$pdo sería el objeto conexión
      $total = $result->fetchColumn();
?>

          <data class="card-price" value="<?php echo  $total; ?>"><?php echo  $total; ?></data>

          <p class="card-text">Last Week</p>

          <div class="divider card-divider"></div>

          <ul class="revenue-list">

            <li class="revenue-item icon-box">

              <span class="material-symbols-rounded  icon  green">trending_up</span>

              <div>
                <?php           
    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 1";
    $result = $connect->query($sql); //$pdo sería el objeto conexión
    $total = $result->fetchColumn();

?>
                <data class="revenue-item-data" value="<?php echo  $total; ?>"><?php echo  $total; ?>%</data>

                <p class="revenue-item-text">Atendidas</p>
              </div>

            </li>

            <li class="revenue-item icon-box">

              <span class="material-symbols-rounded  icon  red">trending_down</span>

              <div>
                <?php           
    $sql = "SELECT COUNT(*) total FROM tarea WHERE state = 0";
    $result = $connect->query($sql); //$pdo sería el objeto conexión
    $total = $result->fetchColumn();

?>
                <data class="revenue-item-data" value="<?php echo  $total; ?>"><?php echo  $total; ?>%</data>

                <p class="revenue-item-text">Pendientes</p>
              </div>

            </li>

          </ul>

        </div>

      </section>

      <!-- 
        - #PROJECTS
      -->

      <section class="projects">

        <div class="section-title-wrapper">
          <h2 class="section-title">Atendiendo las tareas</h2>
         
        </div>

        <?php 

 $id = $_GET['id'];
 $sentencia = $connect->prepare("SELECT * FROM tarea  WHERE idtarea= '$id';");
 $sentencia->execute();

$data =  array();
if($sentencia){
  while($r = $sentencia->fetchObject()){
    $data[] = $r;
  }
}
   ?>
   <?php if(count($data)>0):?>
        <?php foreach($data as $d):?>
<form action="" enctype="multipart/form-data" method="POST"  autocomplete="off">
  <div class="containerss">
  
    <div class="alert-danger">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Importante!</strong> Es importante rellenar los campos con &nbsp;<span class="badge-warning">*</span>
</div>
    <hr>
    <br>
  
    <label for="email"><b>Nombre del cliente</b></label>
    <input type="text" placeholder="ejm: Javier" disabled value="<?php echo $d->nomcl; ?>" required>
    <input type="hidden" name="tarid" value="<?php echo $d->idtarea; ?>">
    <input type="hidden" name="memid" value="<?php echo $_SESSION['id']; ?>">

    <label for="email"><b>Apellido del cliente</b></label>
    <input type="text" placeholder="ejm: Suarez" disabled value="<?php echo $d->apecl; ?>"  required>

    <label for="email"><b>Lugar de procedencia del cliente</b></label>
    <input type="text" placeholder="ejm: Suarez" disabled value="<?php echo $d->sitio; ?>"  required>

    <label for="email"><b>Día del caso</b></label>
    <input type="text" placeholder="ejm: Suarez" disabled value="<?php echo $d->dia; ?>"  required>

    <label for="email"><b>Celular del cliente</b></label>
    <input type="text" placeholder="ejm: Suarez" disabled value="<?php echo $d->celu; ?>"  required>

    <label for="email"><b>Caso del cliente</b></label>
    <input type="text" placeholder="ejm: Suarez" disabled value="<?php echo $d->nomcas; ?>"  required>

    <label for="email"><b>Solución del caso</b></label><span class="badge-warning">*</span>
    <textarea  name="tareresp" placeholder="Write something.." style="height:200px"></textarea>

   
    <hr>
   
    <button type="submit" name="add_det_mem_tarea" class="registerbtn">Guardar</button>
  </div>
  
</form>

<?php endforeach; ?>
  
    <?php else:?>
      <p class="alert alert-warning">No hay datos</p>
    <?php endif; ?> 

      </section>

    </article>
  </main>

  <footer class="footer">
    <div class="container">

    

      <p class="copyright">
        &copy; 2024 <a href="#" class="copyright-link">Celenia Rondinel</a>. Todos los derechos reservados
      </p>

    </div>
  </footer>

  <!-- 
    - custom js link
  -->
  <script src="../../backend/js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include_once '../../backend/php/add_det_mem_tarea.php' ?>

</body>

</html>
<?php }else{ 
    header('Location: ../login.php');
 } ?>