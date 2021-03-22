<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Suppliers</title>
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />
  </head>
  <body>
  
<nav class="uk-navbar-container" uk-navbar >
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav" style="margin : 500">
            <li ><a href="sup.php"> Suppliers</a></li>
            <li><a href="comp.php" active> Companies</a></li>
        </ul>

    </div>
</nav>
  <?php 
require 'db_conn.php';
?>
  <?php 
          $company = $conn->query("SELECT * FROM company ORDER BY id_company DESC");
  ?>
 <div>
  <table class="uk-table uk-table-striped">
  <thead>
      <tr>
          <th>Fantasy name</th>
          <th>State UF</th>
          <th>CNPJ</th>
          <th>Data about the company</th>
      </tr>
  </thead>
  
  <tbody> 
    <?php while($comp = $company->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
          <td><?php echo $comp['fantasy_name'] ?></td>
          <td><?php echo $comp['uf'] ?></td>
          <td><?php echo $comp['cnpj'] ?></td>
          <td> <a href="https://www.receitaws.com.br/v1/cnpj/<?php echo $comp['cnpj'] ?>"> check data</a> </td>
          <?php  } ?>

          <div></div> 
      </tr>
  </tbody>
</table>
</div>
<a href="../addComp.php"><button  class="uk-button uk-button-default">Add Company</button></a><br>
  </body>
  </html>