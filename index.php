<?php 
$db = new mysqli('localhost', 'root', '', 'identity');

$q = "SELECT * FROM firstName";
$result = $db->query($q); //result zawiera "odpowiedz" serwera sql
while($row = $result->fetch_assoc()) { //dopóki możesz wyciągnąć kolejny wiersz
    echo $row['name'].'<br>';
}
?>