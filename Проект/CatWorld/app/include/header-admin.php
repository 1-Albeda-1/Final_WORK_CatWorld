  <header>
      <div class="header-logo">
        <img src="../../assets/img/Logo.png" alt="" onclick="window.location.href='<?php echo BASE_URL . 'main.php'; ?>'">
      </div>
      <div class="create-line-horizontal"></div>
      <div class="conteiner">
        <div class="menu">
          <div class="header-button-select">
            <button class="menu-button button-exit"><a href="<?php echo BASE_URL . 'logout.php'; ?>">Выход</a></button>
          </div>
          <div class="header-button-select">
            <button class="menu-button button-add"><a href="<?php echo BASE_URL . "admin/post/create.php"; ?>">Создать запись</a></button>
          </div>
          <div class="header-button-select">
            <button class="menu-button button-control"><a href="<?php echo BASE_URL . "admin/post/index.php"; ?>">Управление таблицей</a></button>
          </div>
          <?php if(isset($_SESSION['id_admin'])) : ?>
          <div class="username">Пользователь: <?php echo $_SESSION['login']; ?></div>
          <?php endif; ?>
        </div>
      </div>  
      <div class="create-line-horizontal"></div>
  </header>
