<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
$new_hotels = [];
$parking = $_GET['parking'];
$vote = $_GET['vote'];

foreach ($hotels as $hotel) {
    if ($hotel['vote'] >= $vote) {
        if ($parking == 'on') {
            if ($hotel['parking'] == true)
                array_push($new_hotels, $hotel);
        } else
            array_push($new_hotels, $hotel);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form method="GET" action="">
            <label for="parking">Parking</label>
            <input name="parking" id="parking" type="checkbox">
            <label for="vote">Stelle</label>
            <select name="vote" id="vote">
                <option value="" selected disabled hidden></option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
            <button>INVIA</button>
        </form>
        <h1>Lista di Hotel</h1>
        <table class="table">
            <tr>
                <th>name</th>
                <th>description</th>
                <th>parking</th>
                <th>vote</th>
                <th>distance_to_center</th>
            </tr>

            <?php
            foreach ($new_hotels as $hotel) {
                echo "<tr>";
                foreach ($hotel as $key => $value) {
                    if ($key == 'parking' && $value == true)
                        echo "<td>si</td>";
                    else if ($key == 'parking' && $value == false)
                        echo "<td>no</td>";
                    else if ($key == 'distance_to_center')
                        echo "<td>{$value} km</td>";
                    else
                        echo "<td>{$value}</td>";
                }
                echo "</tr>";
            }
            ?>

        </table>
    </div>

</body>

</html>