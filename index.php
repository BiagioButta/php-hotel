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

if ((isset($_GET['vote']) && !empty($_GET['vote'])) && empty($_GET['parking'])) {
    $filtroHotels = array_filter($hotels, fn($hotel) => $hotel['vote'] == $_GET['vote']);
    $hotels = $filtroHotels;
} elseif ((isset($_GET['parking']) && !empty($_GET['parking'])) && empty($_GET['vote'])) {
    $filtroHotels = array_filter($hotels, fn($hotel) => $hotel['parking']);
    $hotels = $filtroHotels;
} elseif ((isset($_GET['vote']) && !empty($_GET['vote'])) && (isset($_GET['parking']) && !empty($_GET['parking']))) {
    $filtroHotels = array_filter($hotels, function ($hotel) {
        return ($hotel['parking'] && ($hotel['vote'] == $_GET['vote']));
    });
    $hotels = $filtroHotels;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="">
                    <select name="vote" id="vote">
                        <option value="" selected>Valutazione</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                    <label for="parking">parking</label>
                    <input type="checkbox" id="parking" name="parking">
                    <button type="submit">Invia</button>
                </form>
            </div>
        </div>
        <div class="row">

            <?php
            foreach ($hotels as $hotel) {
            ?>

            <div class="col">
                <h3>
                    <?php echo $hotel['name'] ?>
                </h3>
                <div>
                    <?php echo $hotel['description'] ?>
                </div>
                <div>
                    <?php echo $hotel['parking'] ?>
                </div>
                <div>
                    <?php echo $hotel['vote'] ?>
                </div>
                <div>
                    <?php echo $hotel['distance_to_center'] ?>
                </div>
            </div>




            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>