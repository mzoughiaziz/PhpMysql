<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
  

    </style>
</head>
<body>
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav" style="margin : 500">
            <li ><a href="inc/sup.php" >Suppliers</a></li>
            <li><a href="inc/comp.php">Companies</a></li>
        </ul>

    </div>
</nav>
<div>
<form action="insert.php" method="post">
    <select class="uk-select" name="uf" required>
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
  </div><br>
  <div class="mb-3">
    <label class="form-label">Fantasy name</label>
    <input type="text" class="uk-input" name="fantasy_name" required>
  </div><br>
  <div class="mb-3">
    <label class="form-label">CNPJ</label>
    <input type="number" class="uk-input" name="cnpj" required>
  </div><br>
    <button type="submit" class="uk-button uk-button-default">Add</button>
  
</div>

</form>
</body>
</html>