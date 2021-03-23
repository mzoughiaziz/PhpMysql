<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=easyjur", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

$name = $_POST['name'];
try{
    $sql = "INSERT INTO suppliers (name, cpf, reg_date,phone,birth_date,rg,company_name,mun_reg , state_reg )
    VALUES (:name, :cpf, :reg_date, :phone,:birth_date,:rg, :company_name, :mun_reg, :state_reg)";
    $stmt = $pdo->prepare($sql);
    
    if(empty($_REQUEST["name"]) && empty($_REQUEST["cpf"]) && empty($_REQUEST["reg_date"]) && empty($_REQUEST["phone"])){
      header('Location:  http://localhost/easyjur/popup.php?emptyfields');
      exit();
   }else{

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

   if (empty($_REQUEST["state_reg"])) {
      $state_reg = "";
      // header('Location: http://localhost/easyjur/popup.php?state_reg=error');
      // exit();
   }else{
      $state_reg = $_REQUEST["state_reg"];
   }
   $stmt->bindParam(':state_reg',$state_reg);

      if (empty($_REQUEST["birth_date"])) {
      $birth_date = "";
      } else {
         $birth_date = $_REQUEST["birth_date"];
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


   if (empty($_REQUEST["company_name"])) {
      $company_name = "(Individual)";
      // header('Location: popup.php?company=error');
      // exit();
   }else{
      $company_name = $_REQUEST["company_name"];
   }
   $stmt->bindParam(':company_name',$company_name);

   
    $stmt->execute();
    header('Location: inc/sup.php');
   }
}
 catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
unset($pdo);
?>
