<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>PostProcess</title>
</head>
<body>

<?php
  try   {

    $date = $_POST['DATE'];
    $text = $_POST['TEXT'];
    
    $PDO = new PDO('mysql:host=localhost;dbname=xs603472_routinemanager;charset=utf8', 'xs603472_rm1', 'lemontree' );
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $sql = "INSERT INTO RoutineAchivement2 (date, text) VALUES (:date, :text) ON DUPLICATE KEY UPDATE text = VALUES(text)"; 
    $stmt = $PDO->prepare($sql);
    $params = array(':date' => $date, ':text' => $text); 
    $stmt->execute($params);

    header("Location: index.php");

 }catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
 }

?>
</body>
</html>