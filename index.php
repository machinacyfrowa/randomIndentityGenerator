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

function generujPESEL(string $plec) : string
{
    //$plec = {'m','k'}
    $rok = rand(20,99);
    $miesiac = rand(1,12);
    $miesiac = str_pad($miesiac, 2, '0', STR_PAD_LEFT);
    $dzien = rand(1,28);
    $dzien = str_pad($dzien, 2, '0', STR_PAD_LEFT);
    $porzadkowe = rand(100,999);
    $nieparzyste = array(1,3,5,7,9);
    $plecLiczba = $nieparzyste[rand(0,4)]; //losowa nieparzysta
    if($plec == 'k') 
        $plecLiczba --;
    $pesel = $rok.$miesiac.$dzien.$porzadkowe.$plecLiczba; //string 10 znakowy
    $pesel = str_split($pesel); //tablica 10 elementowa
    $suma = 0;
    $suma += $pesel[0]*9 + $pesel[1]*7 + $pesel[2]*3 + $pesel[3]*1 + $pesel[4]*9;
    $suma += $pesel[5]*7 + $pesel[6]*3 + $pesel[7]*1 + $pesel[8]*9 + $pesel[9]*7;
    $suma = $suma % 10;
    array_push($pesel, $suma);
    $pesel = implode("", $pesel);
    return $pesel;
}

echo generujPESEL('k');

?>

</body>
</html>