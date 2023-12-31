<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>RoutineAchivement</title>
</head>
<body>



<div id="post_page">
  <form method="post" action="process_post.php">
    <div>DATE <input type="text" name="DATE" value="<?php echo date("Y-m-d") ?>"></div>
    <div>TEXT <textarea name="TEXT" rows="10" cols="100"></textarea></div>
    <div><input type="submit" value="SUBMIT" /></div>
  </form>
</div>

<br>
<br>

<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=xs603472_routinemanager;charset=utf8', 'xs603472_rm1', 'lemontree' ); 
    $sql = 'select * from RoutineAchivement2 order by date desc';
    print('<table border="1"> <tr><th>DATE</th><th>TEXT</th></tr>');
    foreach ($dbh->query($sql) as $row) {
        print('<tr><td>'. $row['date']. '</td>');
        print('<td>'. $row['text']. '</td></tr>');
    }
    print('</table>');
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;
?>


</body>
</html>