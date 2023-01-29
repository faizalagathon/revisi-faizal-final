<?php 

$result = mysqli_query( $conn, "SELECT * FROM admin WHERE username= '{$_SESSION['username']}'" );

?>

<link rel="stylesheet" href="../css/styleAdmin.css">
  
  <!-- HEADER -->
  <nav class="navbar bg-primary judul">
    <div class="container">
      <a class="navbar-brand fw-bold fs-4 ms-4" href="#">
        <img src="../../peminjaman_buku/assets/images/SMKN 1 Cirebon.png" alt="Bootstrap" width="70" height="70">
        Peminjamaan Buku
      </a>
      <div class="d-flex">
        <button class="border-0 bg-white fw-bold rounded-pill" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <img src="../icon/profile.png" width="40rem" alt="" class="bg-light rounded-circle p-0 py-1 pe-1">Profile
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <?php foreach( $result as $dataAdmin ) : ?>
            <img src="../icon/profile.png" width="100rem" alt="" class="mb-3">
            <p><?= $dataAdmin['username'] ?></p>
            <?php endforeach ; ?>
            <div class="footer">
              <form action="../login-daftar/logout.php" method="post">
                <button class="border-0 bg-white fw-bold" type="submit" name="logoutAdmin">
                  <img src="../icon/logout.png" width="30rem" alt="">Logout
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- AKHIR HEADER -->

  <?php

  $url = $_SERVER['REQUEST_URI'];

  $url = explode("/", $url);
  $url = array_pop($url);

  if ( explode('?', $url) ){
    $url = explode('?', $url);
    $url = $url[0];
  }

  ?>

  <!-- MENU -->
  <div class="container">
    <ul class="nav justify-content-center mt-3 border rounded-pill bg-white" style="box-shadow: 5px 5px 5px #c5c5c5;">
      <li class="nav-item">
        <a class="nav-link <?= $url == 'admin.php' ? 'active text-dark text-decoration-underline' : '' ?>" aria-current="page" href="admin.php">
          <img src="../icon/book1.png" width="35rem" alt="" class="ms-4"><br>
          Daftar Buku
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $url == 'peminjam.php' ? 'active text-dark text-decoration-underline' : '' ?>" href="peminjam.php">
          <img src="../icon/reader.png" width="35rem" alt="" class="ms-3"><br>
          Peminjam
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $url == 'tambahbuku.php' ? 'active text-dark text-decoration-underline' : '' ?>" href="tambahbuku.php">
          <img src="../icon/book2.png" width="35rem" alt="" class="ms-4"><br>
          Tambah Buku
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $url == 'feedback.php' ? 'active text-dark text-decoration-underline' : '' ?>" href="feedback.php">
          <img src="../icon/chat.png" width="35rem" alt="" class="ms-3"><br>
          Feedback
        </a>
      </li>
    </ul>
  </div>
  <!-- AKHIR MENU -->