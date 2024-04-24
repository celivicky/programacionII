<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../login.php');

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
              <a href="escritorio.php" class="navbar-link active icon-box">
                <span class="material-symbols-rounded  icon">grid_view</span>

                <span>Home</span>
              </a>
            </li>

            <li>
              <a href="../miembros/mostrar.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">folder</span>

                <span>Miembros</span>
              </a>
            </li>

            <li>
              <a href="../tareas/mostrar.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">list</span>

                <span>Tareas</span>
              </a>
            </li>

            <li>
              <a href="../configuracion/mostrar.php" class="navbar-link icon-box">
                <span class="material-symbols-rounded  icon">settings</span>

                <span>Configuración</span>
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
                    if ($_SESSION['rol']= '1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } else {
                        echo '<p class="card-subtitle">Cliente</p>';
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

      <h2 class="h2 article-title">Hola <?php echo $_SESSION['nombre']; ?></h2>

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
                    if ($_SESSION['rol']= '1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } else {
                        echo '<p class="card-subtitle">Cliente</p>';
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
                    if ($_SESSION['rol']= '1') {
                      echo ' <p class="card-subtitle">Administrador</p>';  
                    } else {
                        echo '<p class="card-subtitle">Cliente</p>';
                    }
               ?>
              </a>
            </li>

            <li>
              <a href="#" class="contact-link icon-box">
                <span class="material-symbols-rounded  icon">scatter_plot</span>

                <?php 
                    if ($_SESSION['state']= '1') {
                      echo ' <p class="card-subtitle">Activo</p>';  
                    } else {
                        echo '<p class="card-subtitle">Inactivo</p>';
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
          <h2 class="section-title">Tareas recientes</h2>

          <button class="btn btn-link icon-box" onclick="location.href='../tareas/mostrar.php'">
            <span>Ver todas</span>

            <span class="material-symbols-rounded  icon" aria-hidden="true">arrow_forward</span>
          </button>
        </div>

        <ul class="project-list">
<?php 
$sentencia = $connect->prepare("SELECT * FROM tarea ORDER BY idtarea DESC;");
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
          <li class="project-item">
            <div class="card project-card">

              <button class="card-menu-btn icon-box" aria-label="More" data-menu-btn>
                <span class="material-symbols-rounded  icon">more_horiz</span>
              </button>

              <ul class="ctx-menu">
<?php 
                if ($d->state ==0) {
                  echo '<a href="tel:'.$d->celu.'">
                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">smartphone</span>

                    <span class="ctx-menu-text">Llamar</span>
                  </button>
                </li>
                </a>
                <a href="../tareas/attend.php?id='.$d->idtarea.'">
                <li class="ctx-item">
                  <button class="ctx-menu-btn red icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">gpp_maybe</span>

                    <span class="ctx-menu-text">Atender</span>
                  </button>
                </li>
                </a>
                ';
                } elseif ($d->state ==1) {
                  echo '<li class="divider"></li>
                <a href="../tareas/view.php?id='.$d->idtarea.'">
                <li class="ctx-item">
                  <button class="ctx-menu-btn  icon-box">
                    <span class="material-symbols-rounded  icon" aria-hidden="true">check</span>

                    <span class="ctx-menu-text">Ver</span>
                  </button>
                </li>
                </a>';
                }
               ?>
              </ul>

              <time class="card-date" datetime="2022-04-09"><?php echo $d->dia ?></time>

              <h3 class="card-title">
                <a href="../tareas/view.php?id=<?php echo $d->idtarea ?>"><?php echo $d->nomcas ?></a>
              </h3>

              <?php 
                if ($d->state ==0) {
                  echo '<div class="card-badge orange">Pendiente</div>';
                } elseif ($d->state ==1) {
                  echo '<div class="card-badge green">Atendido</div>';
                }
               ?>

              <p class="card-text">
                <?php echo $d->sitio ?>
              </p>
            </div>
          </li>
<?php endforeach; ?>
          <?php else:?>
                           <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <strong>Danger!</strong> No hay datos.
    </div>
    <?php endif; ?>

        </ul>

      </section>
    </article>
  </main>

  <!-- 
    - #FOOTER
  -->

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

</body>

</html>
<?php }else{ 
    header('Location: ../login.php');
 } ?>