<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

<?php 
$db = new mysqli('localhost', 'root', '', 'identity');
$db->set_charset('utf8');
$q = "SELECT * FROM firstName";
$result = $db->query($q); //result zawiera "odpowiedz" serwera sql
$firstName = array();

while($row = $result->fetch_assoc()) { //dopóki możesz wyciągnąć kolejny wiersz
    array_push($firstName, $row['name']);
}

$q = "SELECT * FROM lastname";
$result = $db->query($q); //result zawiera "odpowiedz" serwera sql
$lastName = array();

while($row = $result->fetch_assoc()) { //dopóki możesz wyciągnąć kolejny wiersz
    array_push($lastName, $row['name']);
}

echo '<pre>';
print_r($firstName);
print_r($lastName);

for($i = 0 ; $i < 10 ; $i++) {
    $randomId = $firstName[rand(0,count($firstName)-1)];
    $randomId .= " ";
    $randomId .= $lastName[rand(0,count($lastName)-1)];

    echo $randomId;
    echo '<br>';
}

?>

</body>
</html>