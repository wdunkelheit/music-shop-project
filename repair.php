<?php include('server.php');

if(empty($_SESSION['accType'])){
    header("Location: repairDefault.php");
}
elseif($_SESSION['accType'] == "customer"){
    header("Location: repairCustomer.php");
}
else{
    header("Location : repairEmployee.php");
}

?>