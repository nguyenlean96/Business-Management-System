<?php
  function clearSession($key = "") {
    if (!empty($_SESSION)) {
      foreach ($_SESSION as $s) {
        if (isset($_SESSION[empty($key) ? key($_SESSION) : $key])) {
          setcookie(empty($key) ? key($_SESSION) : $key, '', time() - 60 * 60 * 24 * 3650, '/', '', 0);
          unset($_SESSION[empty($key) ? key($_SESSION) : $key]);
        }
      }
    }
  }

  function validateClientInfo($client_data) {
    $valid = true;
    $temp = new Client($client_data["firstName"], $client_data["lastName"], $client_data["compName"], $client_data["compNum"], $client_data["phoneNum"], $client_data["cellNum"], $client_data["carrier"], $client_data["hstNum"], $client_data["website"], $client_data["mail"]);
    return $temp->queryGen();
  }
  function addClientQuery($client_data) {
    $temp = new Client($client_data[0], $client_data[1], $client_data[2], $client_data[3], $client_data[4], $client_data[5], $client_data[6], $client_data[7], $client_data[8], $client_data[9]);

    return $temp->queryGen();
    // if ($data != null) {
    //   return "insert into client values (null, \"$data[0]\", \"$data[1]\", \"$data[2]\", $data[3], \"$data[4]\", \"$data[5]\", \"$data[6]\", \"$data[7]\", \"$data[8]\", \"$data[9]\", $data[10]);";
    // }
    // return "";
  }
  function addEmpQuery() {
    

    
  }
  function activation_key_gen() {
    $temp = "";
    for ($i=0; $i < 10; $i++) {
      $str_or_int = rand(0, 10);
      if ($i === 0) {
        $temp .= chr(rand(97, 122));
        continue;
      }
      if (($str_or_int %2) == 0)
        $temp .= chr(rand(97, 122));
      else
        $temp .= chr(rand(49, 57));
    }
    return $temp;
  }
  function genuine_key() {

  }
  function login_form($error) {
    $flag1 = false;
    $flag2 = false;
    if (!empty($error)) {
      if ($error['username'] === "incorrect")
        $flag1 = true;
      if ($error['passwd'] === "incorrect")
        $flag2 = true;
    }
    echo '
    <div class="card gap-1 col-4 mx-auto" style="margin: 10vh 0 5vh;box-shadow: 3px 3px 16px 1px #ccc;">
      <h5 class="card-header">Login</h5>
      <div class="card-body">
        <form method="post">
          <input type="hidden" name="action" value="login">
          <div class="mb-3 col-10 mx-auto">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="username" type="email" class="form-control'.($flag1 ? " is-invalid" : "").'" id="exampleInputEmail1" aria-describedby="emailHelp">
            '.($flag1 ? "<div class=\"invalid-feedback\">Incorrect username. Please try again.</div>" : "").'
          </div>
          <div class="mb-3 col-10 mx-auto">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="usrpasswd" type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="d-grid gap-4 col-8 mx-auto text-center">
            <a href="?page=recovery" class="link-primary">Login with your gold-fish memory?</a></div>
          <div class="d-grid gap-4 col-5 mx-auto text-center">
            <button class="btn btn-primary" style="margin-top: 2vh; margin-bottom: 3vh;" type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
    ';
  }
  function _get($attribute, $method = 'post') {
    if (strtolower($method) == "post") {
      return filter_input(INPUT_POST, $attribute, FILTER_SANITIZE_STRING);
    } else if (strtolower($method) == "get") {
      return filter_input(INPUT_GET, $attribute, FILTER_SANITIZE_STRING);
    }
  }
  function dir_corrector($path, $separator = DIRECTORY_SEPARATOR) {
    return join($separator, $path);
  }
  function _disp($tag, $dispStyle, $content) {
    $style = 'style="';
    foreach ($dispStyle as $key => $val) {
      $style .= $key.': '.$val.';';
    }
    return '<'.$tag.' '.$style.'">'.$content.'</'.$tag.'>';
  }
  function _error($code = '') {
    return $code._disp("span", ["color" => "red"], "#Error");
  }
?>