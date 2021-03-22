<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=easyjur", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

$name = $_POST['name'];
try{
    $sql = "INSERT INTO suppliers (name, cpf, reg_date,phone,birth_date,rg,company_name,mun_reg )
    VALUES (:name, :cpf, :reg_date, :phone,:birth_date,:rg, :company_name, :mun_reg)";
    $stmt = $pdo->prepare($sql);
    
   if(empty($_REQUEST["name"]) && empty($_REQUEST["cpf"]) && empty($_REQUEST["reg_date"]) && empty($_REQUEST["phone"])){
      header('Location:  http://localhost/easyjur/popup.php?emptyfields');
      exit();
   }

    if (empty($_REQUEST["name"])) {
        $name = "";
        header('Location:  http://localhost/easyjur/popup.php?name=error');
        exit();
     }else {
        $name = $_REQUEST["name"];
     }
    $stmt->bindParam(':name',$name);

    if (empty($_REQUEST["cpf"]) || !(strlen(strval($_REQUEST["cpf"]))==11)) {
        $cpf = "";
        header('Location: http://localhost/easyjur/popup.php?cpf=error');
        exit();
     }else{
        $cpf = $_REQUEST["cpf"];
     }
    $stmt->bindParam(':cpf',$cpf);

     if (empty($_REQUEST["reg_date"])) {
        $reg_date = "";
        header('Location: http://localhost/easyjur/popup.php?regdate=error');
        exit();
     }else {
        $reg_date = $_REQUEST["reg_date"];
     }

    $stmt->bindParam(':reg_date',$reg_date);

    if (empty($_REQUEST["phone"])) {
        $phone = "";
        header('Location: http://localhost/easyjur/popup.php?phone=error');
        exit();
     }else {
        $phone = $_REQUEST["phone"];
     }
    $stmt->bindParam(':phone',$phone);

    if (empty($_REQUEST["mun_reg"])) {
      $mun_reg = "";
      // header('Location: http://localhost/easyjur/popup.php?munreg=error');
      // exit();
   }else {
      $mun_reg = $_REQUEST["mun_reg"];
   }
   $stmt->bindParam(':mun_reg',$mun_reg);

    if (empty($_REQUEST["birth_date"])) {
        $birth_date = "";

        // header('Location: popup.php?birthdate=error');
        // exit();
     }else {
        $birth_date = $_REQUEST["birth_date"];
        // $today = date("Y-m-d");
        // $diff = date_diff(date_create($birth_date), date_create($today));
        // echo "the sup's age is ".$diff;
     }
    $stmt->bindParam(':birth_date',$birth_date);

    if (empty($_REQUEST["rg"])) {
        $rg = "";
        // header('Location: popup.php?rg=error');
        // exit();
     }else {
        $rg = $_REQUEST["rg"];
     }
    $stmt->bindParam(':rg',$rg);

   //  if (empty($_REQUEST["age"])) {
   //      $age = "";
   //      // header('Location: popup.php?cpf=error');
   //      // exit();
   //      //explode the date to get month, day and year
   //      $birthDate = [];
   //      $birthDate .= explode("-", $birth_date);
   //      $age = (date("md", date("U", 
   //      mktime(0, 0, 0, $birthDate[0],
   //       $birthDate[1], $birthDate[2]))) > date("md")
   //      ? ((date("Y") - $birthDate[2]) - 1)
   //      : (date("Y") - $birthDate[2]));
   //      echo "Age is:" . $age;
   //   }else {
   //      $age = $_REQUEST["age"];
   //   }
   //  $stmt->bindParam(':age', $age);

   if (empty($_REQUEST["company_name"])) {
      $company_name = "(Individual)";
      header('Location: popup.php?company=error');
      exit();
   }else{
      $company_name = $_REQUEST["company_name"];
   }
   $stmt->bindParam(':company_name',$company_name);
   // require 'inc/db_conn.php';   
   // $company = $conn->query("SELECT * FROM company ORDER BY id_company DESC");
   //      while($comp = $company->fetch(PDO::FETCH_ASSOC))  
   //      {
   //  if (empty($_REQUEST["company_name"])) {
   //      $company_name = "(Individual)";
   //      // header('Location: popup.php?company=error');
   //      // exit();
   //   }elseif($comp['uf']=='PR'){
   //          $birth_date = $_REQUEST["birth_date"];
   //          $date = new DateTime($birth_date);
   //          $now = new DateTime();
   //          $age = $now->diff($date);
   //          return $age->y;
   //          if($age<18){
   //             header('Location: http://localhost/easyjur/popup.php?age=error');
   //             exit();
   //          }
   //       }else {
   //          $company_name = $_REQUEST["company_name"];
   //       }
   //    }
    $stmt->bindParam(':company_name',$company_name);

    // $stmt->bindParam($name);
    // $stmt->bindParam(':reg_date', $_REQUEST['reg_date']);
    // $stmt->bindParam(':phone', $_REQUEST['phone']);
    // $stmt->bindParam(':birth_date', $_REQUEST['birth_date']);
    // $stmt->bindParam(':rg', $_REQUEST['rg']);
    // $stmt->bindParam(':age', $_REQUEST['age']);
    // $stmt->bindParam(':company_name', $_REQUEST['company_name']);
  
  
    $stmt->execute();
    header('Location: inc/sup.php');
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
unset($pdo);
?>
<?php 
          $company = $conn->query("SELECT * FROM company ORDER BY id_company DESC");
          while($comp = $company->fetch(PDO::FETCH_ASSOC))  
      { ?>
      <option value="<?php echo $comp['fantasy_name'] ?>"> <?php echo $comp['fantasy_name'] ?> </option>
<?php } ?>