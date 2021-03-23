 <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Suppliers</title>
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

      
  </head>
  <body>
  <nav class="uk-navbar-container">
    <div class="uk-navbar">
        <ul class="uk-navbar-nav">
            <li ><a href="sup.php"> Suppliers</a></li>
            <li><a href="comp.php" active> Companies</a></li>
        </ul>

    </div>
</nav>

  <?php 
require 'db_conn.php';
?>
  <?php 
          $supplier = $conn->query("SELECT * FROM suppliers ORDER BY id DESC");
  ?>
  <div>
<!-- search bar -->
<div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="uk-input" />
    </div>
   </div>
   <br />
   <div id="result"></div>

<a href="../popup.php"><button  class="uk-button uk-button-default uk-margin">Add Sup plier</button></a><br>
</div>
  </body>
  </html>
  <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

