<?php
  session_start();
  include 'model/classes.php';
  include 'model/function/function.php';
  require ('model/database_pdo.php');
  $error = [];
  if (isset($_SESSION['conn_status']))
    $db_conn_status = $_SESSION['conn_status'];
  
  $webpage = new Webpage("Assignment 4", ["Shawarma Boys", "(Renzzi Adorador - 101277841", "Le An Nguyen - 101292266", "Jacob Solano - 101348583", "Israr Ahmed Wahid – 101348701)"], ['Assignment 4', "Assignment", "4", "PHP","COMP1230"]);
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['request']) && $_POST['request'] == 'logout') {
      clearSession("username");
    }
    if (isset($_POST['action'])) {
      $action = _get('action');
      switch($action) {
        case "add_new_client":
          $query = addClientQuery([_get('client_fName'), _get('client_lName'), _get('client_company_name'), _get('client_company_num'), _get('client_phone_num'), _get('client_cell_num'), _get('client_carrier'), _get('client_hst'), _get('client_web'), _get('client_mail')]);
          
          $getQuery = $db_conn->prepare($query);
          
          $getQuery->execute();
          header("Location:?page=view_client");
          break;
        case "add_new_employee":
          $query = 'insert into employee values (null, "'._get("emp_fName").'", "'._get("emp_lName").'", "'._get("emp_mail").'", "NA", "NA", "'._get("emp_passwd").'", 0);';
          $prepareQuery = $db_conn->prepare($query);
          $prepareQuery->execute();
          break;
        case "login":
          $temp_user = _get('username');
          $prepare = $db_conn->prepare('select mail from employee where mail = "'.$temp_user.'";');
          $prepare->execute();
          $result = $prepare->fetchAll();
          if (count($result) > 0) {
            $_SESSION['username'] = $temp_user;
            header("Location:?page=home");
          } else {
            $_POST['login_error'] = ["username" => "incorrect", "passwd" => ""];
            header("Location:?page=login");
          }
          break;
        default:
          header("Location:?page=error");
          break;
      }
    }
  }
 
  if (!isset($_SESSION['username']) && (_get('page', 'get') != "login" && _get('page', 'get') != "manage_employee")) {
    header("Location:?page=login");
  }
  if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = _get('page', 'get');
  } 
  else if (empty($page)) header("Location:?page=login");

  
  
  if ($page) {
    switch ($page) {
      case 'home':
        include 'view/home.phtml';
        break;
      case 'login':
        include 'view/login.phtml';
        break;
      case 'recovery':
        include 'view/recovery.phtml';
        break;
      case 'manage_employee':
        include 'view/employeeManagement.phtml';
        break;
      case 'manage_client':
        include 'view/clientManagement.phtml';
        break;
      case 'client_view':
        include 'view/client_view.phtml';
        break;
      default:
        include 'view/error.phtml';
        break;
    }
  }
?>
