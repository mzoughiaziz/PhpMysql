<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/js/uikit-icons.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EasyJur</title>
  <style>
  #hidden_div , #hidden_div2 {
    display: 'none';
  }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<nav class="uk-navbar-container" uk-navbar >
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li ><a href="inc/sup.php" >Suppliers</a></li>
            <li><a href="inc/comp.php">Companies</a></li>
        </ul>

    </div>
</nav>

<form action="insertSup.php" method="POST">
<div class="uk-container-xsmall"  style="margin-left: auto;
    margin-right: auto;
    width: 50em">
   <div class="mb-3" style="">
    <label class="form-label">Supplier's name</label>
    <input type="text" class="uk-input" name="name">
  </div>
   Type of Supplier
  <select  class="uk-select"  name="typeSup" onChange="showDiv('hidden_div',this)" >
    <option value="2" selected> Select type</option>
    <option value="0"> Company </option>
    <option value="1" >Individual </option>
  </select> <br>
  <div name="hidden_div2">
    Company
     <select name="company_name" id="comp" class="uk-select" value="Individual">
      <option value="" selected> select a company </option>
      <?php 
        require 'inc/db_conn.php';
      ?>
      <?php 
          $company = $conn->query("SELECT * FROM company ORDER BY id_company DESC");
          while($comp = $company->fetch(PDO::FETCH_ASSOC))  
      { ?>
    
      <option value="<?php echo $comp['fantasy_name'] ?>"> <?php echo $comp['fantasy_name'] ?> </option>
      <?php } ?>
  </select> <br>

  <a href="inc/comp.php" class="uk-button uk-button-default" >Add company</a>
  </div>
  <div class="mb-3">
     CPF
    <input type="number" class="uk-input" name="cpf" id="cpf">
  </div>
  <div class="mb-3">
    <label class="form-label">Registration date / time</label>
    <input type="date" class="uk-input" name="reg_date">
  </div>
 
  <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            <label><input class="uk-radio" type="radio" name="radio2" checked>  Legal entity </label>
            <label><input class="uk-radio" type="radio" name="radio2" onClick="showMun('hidden_div2',this)"> Legal person</label>
        </div>

  <div id="hidden_div2">
    <label class="form-label">Municipality registration</label>
    <input type="number" class="uk-input" name="mun_reg">
  </div>

  <div class="mb-3">
    <label class="form-label">Phone number</label>
    <input type="number" class="uk-input" name="phone">
  </div><br>
  <div class="mb-3" id="hidden_div">
    <label class="form-label">Birth Date</label>
    <input type="date" class="uk-input" name="birth_date" id="birth_date">
  <br>
    <label class="form-label">Register number</label>
    <input type="number" class="uk-input" name="rg">
  </div>

  <button type="submit" class="uk-button uk-button-default" name="submit" id="myLink" >Submit</button><br>
</form>
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl, "name=error") == true){
      echo "<p> Supplier's name field is invalid! </p>";
    }else if(strpos($fullUrl, "emptyfields") == true){
      echo "<p> No data found! </p>";
    }else if(strpos($fullUrl, "cpf=error") == true){
      echo "<p> CPF field is invalid! </p>";
    }else if(strpos($fullUrl, "phone=error") == true){
      echo "<p> Phone number field is invalid! </p>";
    }else if(strpos($fullUrl, "regdate=error") == true){
      echo "<p> Registration date field is invalid! </p>";
    }else if(strpos($fullUrl, "age=error") == true){
      echo "<p> Age of supplier is not valid ! </p>";
    }
?>
 <script>
    function showDiv(divId, element)
  {
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
   
 }
 function showMun(divId2, element){
  document.getElementById(divId2).style.display = element.value == 1 ? 'block' : 'none';
 }
    
   </script>
  </body>
</html>
