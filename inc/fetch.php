<?php
    $connect = mysqli_connect("localhost", "root", "", "easyjur");
    $output = '';
    
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($connect, $_POST["query"]);
        $query = "
        SELECT * FROM suppliers 
        WHERE name LIKE '%".$search."%'
        OR cpf LIKE '%".$search."%' 
        OR reg_date LIKE '%".$search."%'
        ";
    }
    else
    {
    $query = "
    SELECT * FROM suppliers ORDER BY name
    ";
    }
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
    $output .= '
    <table class="uk-table uk-table-striped">
    <thead>
      <tr>
         <th>Supplier name</th>
         <th>Register identity (CPF/CNJP)</th>
         <th>Register Date</th>
         <th>Phone number</th>
         <th>Birth date</th>
         <th>Register number</th>
         <th>Company name</th>
         <th>Municipality registration</th>
      </tr>
    </thead>
    ';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
    <tr>
     <td>'.$row["name"].'</td>
     <td>'.$row["cpf"].'</td>
     <td>'.$row["reg_date"].'</td>
     <td>'.$row["phone"].'</td>
     <td>'.$row["birth_date"].'</td>
     <td>'.$row["rg"].'</td>
     <td>'.$row["company_name"].'</td>   
     <td>'.$row["mun_reg"].'</td> 
    </tr>
    ';
    }
    echo $output;
    }
    else
    {
      echo 'Supplier Not Found';
    }
?>
