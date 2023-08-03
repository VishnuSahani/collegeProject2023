<nav class="navbar navbar-expand-lg navbar-dark bg-bhagwa sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="login">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['homeNavbr']=='Home') echo 'active';?>" aria-current="page" href="index">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['homeNavbr']=='FacultyLogin') echo 'active';?>" href="faculty-login.php">Faculty Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['homeNavbr']=='StdLogin') echo 'active';?>" href="std-login">Student Login</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['homeNavbr']=='StdRegistration') echo 'active';?>" href="std-register">Student Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['homeNavbr']=='Query') echo 'active';?>" href="#" >Query</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if($_SESSION['homeNavbr']=='Feedback') echo 'active';?>" href="#" >Feedback</a>
        </li>

      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>