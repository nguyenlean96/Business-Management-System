<?php
if(isset($_POST['submit'])) {
    $phone = '+1'.$_POST['phone'];
    $message = $_POST['message'];


    $ch = curl_init('https://textbelt.com/text');
    $data = array(
      'phone' => $phone,
      'message' => $message,
      'key' => '5168367d5f5aa916e7223cb31ddc08023d50b139TwQwFHR683j2isiE9MqMXPnUM',
    );
    
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP SMS Notification</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">SMS Form</h2>
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone Number:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="message">Message:</label>
      <div class="col-sm-10">
          <textarea name="message" class="form-control" placeholder="Enter message"></textarea>  
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
