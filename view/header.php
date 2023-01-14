<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $webpage->getTitle() ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $webpage->getTitle() ?>">
    <meta name="keywords" content="<?= $webpage->getKeywords() ?>">
    <meta name="author" content="<?= $webpage->getAuthors() ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
      * {
        box-sizing: border-box;
      }
      #footer, footer { text-align: center; }
      #topbtn {
        display: none;
        position: fixed;
        bottom: 2%;
        right: 1%;
        z-index: 99;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 0.8%;
        border-radius: 8px;
        color: black;
        background-color: rgb(94, 243, 64);
        transition-duration: 0.5s;
      }
      #topbtn:hover {
        transition-duration: 0.2s;
        color: white;
        background-color: #333;
      }
       .dropdown-toggle, .navbar-nav  li a{
        color: white !important;
        font-weight: bold;
        text-transform: uppercase;
        }
      .navbar-nav li a:hover {
        color: #06d2ff !important;
        }
      .navbar-nav > li > .dropdown-menu {
        background-color: #212529;
      }
      .navbar-nav > li > .dropdown-menu a:hover {
        background-color: #484848;
      }
      .dropdown-item:hover{
        color: #06d2ff !important;
        background-color: #484848 !important;
      }
      #offer {
        min-height: 50vh;
        background: white;
        margin: auto;
        color: #23272a;
      }
      .divText {
        width: 55%;
        padding: 1em;
      }
      .flex-container{
        padding: 3em;
        display: flex;
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
        margin: auto;
        width: 80%;
      }
    </style>
  </head>
  <body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color: white !important; font-weight: bold; text-transform: uppercase;">ASSIGNMENT 4</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php if (isset($_SESSION['username'])) : ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?page=home">Home</a>
            </li>
            <li class="nav-item dropdown">
              <div class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Client Management</div>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="?page=manage_client">Add Client</a>
                </li>
                <li><a class="dropdown-item" href="?page=client_view">Client List</a></li>
              </ul>
            </li>
            <?php endif; ?>
          </ul>
          <div class="d-flex">
            <?php if (!isset($_SESSION['username'])) : ?>
              <form method="post">
                <input name="action" type="hidden" value="login">
                <input name="username" type="hidden" value="nguyenlean96@gmail.com">
                <input class="nav-link active" style="border: 0; background-color: transparent;" type="submit" value="I have a cat">
              </form>
            <?php endif; ?>

            <?php if (isset($_SESSION['username'])) : ?>
              <div class="nav-link" style="color: #06d2ff; font-weight: bold; text-transform: uppercase;"><?= $_SESSION['conn_status'] ?></div>
              
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Logged in as [ <?= $_SESSION['username'] ?> ]</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form method="post">
                        <input name="request" type="hidden" value="logout" >
                        <input class="dropdown-item" style="border: 0; color: white; font-weight: bold; text-transform: uppercase;" type="submit" value="Logout">
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
              
            <?php endif; ?>
          </div>
        </div>
      </div>
    </nav>
    <div style="padding-top: 8vh;">
    <pre>
      <?= var_dump($_POST) ?>
    </pre>
