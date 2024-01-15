<?php 
    try{
    include "../../database.php";
    
    $query = "UPDATE PURCHASE_ORDER SET PO_STATUS = 'DOWNLOADABLE' WHERE PO_STATUS = 'PROCESSING'";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    echo '<script>setTimeout(function () { window.location.href = "../POmade.php";}, 500);</script>';

    $pdo = null;
    $stmt = null;
    die();
}
catch(PDOException $e){
    die("Query failed: ". $e->getMessage());
}
?>