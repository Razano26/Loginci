<nav class="navbar navbar-expand-lg navbar-dark bg-dark statik-top">
  <div class="container-fluid">

    <a class="navbar-brand" href="index.php?page=0">
      <img class="m-2" src="Files/Picture/warning-icon-png-2754.png" width="45px">
      Loginci
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET["page"])){if($_GET["page"]== 0){echo ' active" aria-current="page"';}else{echo '"';};}else{echo ' active" aria-current="page"';};?> href="index.php?page=0">Données</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET["page"])){if($_GET["page"]== 1){echo ' active" aria-current="page"';}else{echo '"';};}else{echo '"';};?> href="index.php?page=1">Statistiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php if(isset($_GET["page"])){if($_GET["page"]== 2){echo ' active" aria-current="page"';}else{echo '"';};}else{echo '"';}; if(get_user_by_id($_SESSION['ID'])['Privilege'] == 1){ echo ' href="index.php?page=2"';} else {echo ' disabled';}?>>Settings</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo(get_user_by_id($_SESSION['ID'])['Prenom']);?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="index.php?logout=1">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>