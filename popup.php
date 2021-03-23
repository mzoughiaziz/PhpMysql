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
    <?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl, "name=error") == true){
      echo "<p style='color:red;'> Supplier's name field is invalid! </p>";
    }else if(strpos($fullUrl, "emptyfields") == true){
      echo "<p style='color:red;'> No data found! </p>";
    }else if(strpos($fullUrl, "cpf=error") == true){
      echo "<p style='color:red;'> CPF field is invalid! </p>";
    }else if(strpos($fullUrl, "phone=error") == true){
      echo "<p style='color:red;'> Phone number field is invalid! </p>";
    }else if(strpos($fullUrl, "regdate=error") == true){
      echo "<p style='color:red;'> Registration date field is invalid! </p>";
    }else if(strpos($fullUrl, "age=error") == true){
      echo "< style='color:red;'> Age of supplier is not valid ! </p>";
    }
?>
   <div class="mb-3" style="">
    <label class="form-label">Supplier's name</label>
    <input type="text" class="uk-input" name="name">
  </div>
   Type of Supplier
  <select  class="uk-select"  name="typeSup" onChange="showDiv('hidden_div','hidden_div2',this)" >
    <option value="2" selected> Select type</option>
    <option value="0"> Company </option>
    <option value="1" >Individual </option>
  </select> <br>
  <div id="hidden_div2">
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

  <a href="addComp.php" class="uk-button uk-button-default" >Add company</a>
  </div>
  <div class="mb-3">
     CPF/CNPJ
    <input type="number" class="uk-input" name="cpf" id="cpf">
  </div>
  <div class="mb-3">
    <label class="form-label">Registration date / time</label>
    <input type="date" class="uk-input" name="reg_date">
  </div>
  <label class="form-label">Supplier's state</label>
  <select class="uk-select uk-margin" name="uf" id='uf' required>
     <option selected>Select the company's state</option>
     <option value="AC">AC</option>
     <option value="AL">AL</option>
     <option value="AM">AM</option>
     <option value="AP">AP</option>
     <option value="BA">BA</option>
     <option value="CE">CE</option>
     <option value="DF">DF</option>
     <option value="ES">ES</option>
     <option value="GO">GO</option>
     <option value="MA">MA</option>
     <option value="MG">MG</option>
     <option value="MS">MS</option>
     <option value="MT">MT</option>
     <option value="PA">PA</option>
     <option value="PB">PB</option>
     <option value="PE">PE</option>
     <option value="PI">PI</option>
     <option value="PR">PR</option>
     <option value="RJ">RJ</option>
     <option value="RN">RN</option>
     <option value="RO">RO</option>
     <option value="RR">RR</option>
     <option value="RS">RS</option>
     <option value="SC">SC</option>
     <option value="SE">SE</option>
     <option value="SP">SP</option>
     <option value="TO">TO</option>
     </select>  
  
  <div class="uk-margin">
  <label class="form-label"> Legal situation </label>
        <select class="uk-select" name="leg" id="leg_ent" onChange="showMun(mun_hid,this)">
          <option value="">  Select Legal situation  </option>
          <option value="legal_entity">  Legal entity </option>
          <option value="legal_person" > Legal person </option>
        </select>
  </div>

  <div id="mun_hid" style="display:none">
    <label class="form-label">Municipality registration</label>
    <input type="number" class="uk-input" name="mun_reg">
  </div>
  <div id="mun_hid2" style="display:none">
    <label class="form-label">State registration</label>
    <input type="number" class="uk-input" name="state_reg">
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

  <button type="submit" class="uk-margin uk-button uk-button-default" name="submit" id="submit" >Submit</button><br>
</form>

 <script>
    function showDiv(divId, divId2, element)
  {
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
    document.getElementById(divId2).style.display = element.value == 0 ? 'block' : 'none';
  }

document.querySelector('#leg_ent').addEventListener('change', function() {
  if (document.querySelector('#leg_ent').value == 'legal_entity') {
      document.querySelector('#mun_hid').style.display = 'block';
  }else {
    document.querySelector('#mun_hid').style.display = 'none';
  }
});

document.querySelector('#uf').addEventListener('change', function() {
  if (document.querySelector('#leg_ent').value == 'legal_entity') {
    var uf = document.querySelector('#uf').value;
    if (uf == 'DF') {
      document.querySelector('#mun_hid2').style.display = 'block';
      document.querySelector('#mun_hid').style.display = 'none';
    } else {
      document.querySelector('#mun_hid').style.display = 'block';
      document.querySelector('#mun_hid2').style.display = 'none';
    }
  }
});


function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

   document.querySelector('#submit').addEventListener('click', function() {
   var uf = document.querySelector('#uf').value;
   var d = document.querySelector('#birth_date').value;
   var birthdate = d.toString();
   var age = getAge(birthdate);
   if((age<18) && (uf == 'PR'))
   {
      alert("Validation failed Supplier is underage (<18 years old)");
      returnToPreviousPage();
      return false;
   }else if(!document.form.name.value == ""){
     alert("New Supplier Added!");
     return true;
   }
  });
   
   </script>
  </body>
</html>
