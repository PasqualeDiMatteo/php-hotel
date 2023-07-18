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

$value_parking = isset($_GET['parking']);
$vote_hotel = $_GET['vote_hotel'] ?? "";


if ($value_parking) {
    $hotels = array_filter($hotels, fn ($hotel) => $hotel['parking']);
}

if ($vote_hotel) {
    $hotels = array_filter($hotels, fn ($hotel) => $hotel['vote'] == $vote_hotel);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous' />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>PHP Hotel</title>
</head>

<body>
    <div class="container mt-4">
        <!-- Title -->
        <h1>Hotels</h1>
        <hr>

        <form action="index.php">
            <div class="form-check mb-4">
                <input class="form-check-input" type="radio" name="parking" id="with-parking" value="true" <?= isset($_GET['parking']) ? 'checked' : '' ?>>
                <label class="form-check-label" for="with-parking">
                    With Parking
                </label>
            </div>
            <select class="form-select mb-4" name="vote_hotel">
                <option selected>Open this select menu</option>
                <?php for ($i = 1; $i <= 5; $i++) : ?>
                    <option value="<?= $i ?>" <?= $vote_hotel == $i ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor ?>
            </select>
            <button class="btn btn-primary">Filtra</button>
            <button class="btn btn-danger"><a href="index.php" class="text-white text-decoration-none">Annulla</a></button>
        </form>
        <!-- Table -->
        <table class="table mt-5">
            <!--Table Head -->
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance from center</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody>
                <?php foreach ($hotels as $hotel) : ?>
                    <tr>
                        <th scope="row"><?= $hotel["name"] ?></th>
                        <td><?= $hotel["description"] ?></td>
                        <?php if ($hotel["parking"] === true) : ?>
                            <td><i class="fa-solid fa-check"></td>
                        <?php else : ?>
                            <td><i class="fa-solid fa-x"></td>
                        <?php endif ?>
                        <td><?= $hotel["vote"] ?></td>
                        <td><?= $hotel["distance_to_center"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>