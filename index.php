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

$parking = isset($_GET['parking']);
$min_rating = $_GET['rating'] ?? '';

$arr_filtered  = $hotels;

//filtro parcheggio
if($parking){
    $arr_filtered_temp = [];

    foreach ($arr_filtered as $hotel) {
        if ($hotel['parking']) {
            $arr_filtered_temp[] = $hotel;
        }
    }

    $arr_filtered = $arr_filtered_temp;

}

//filtro voto
if($min_rating){
    $arr_filtered_temp = [];

    foreach ($arr_filtered as $hotel) {
        if ($hotel['vote'] >= $min_rating) {
            $arr_filtered_temp[] = $hotel;
        }
    }

    $arr_filtered = $arr_filtered_temp;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"
		defer></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <h1>Hotels</h1>

        <form class="row row-cols-lg-auto g-3 align-items-center" action="" method="get">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="parking" name="parking" <?= $parking ? 'checked' : '' ?>>
				<label class="form-check-label" for="parking">
					Solo con parcheggio
				</label>
			</div>

			<div class="mb-3 d-flex">
				<label for="rating" class="form-label">Voto minimo</label>
				<input type="number" class="form-control" id="rating" name="rating" value="<?= $min_rating ?>">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/php-hotel" class="btn btn-secondary">Reset</a>
		</form>

        <table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Descrizione</th>
					<th scope="col">Parcheggio</th>
					<th scope="col">Rating</th>
					<th scope="col">Distanza dal centro (km)</th>
				</tr>
			</thead>

			<tbody><?php
				foreach($arr_filtered as $hotel) { ?>
					<tr>
						<th scope="row"><?= $hotel['name'] ?></th>
						<td><?= $hotel['description'] ?></td>
						<td><i class="bi <?= $hotel['parking'] ? 'bi-check-circle-fill text-success' : 'bi-x-circle-fill text-danger' ?>"></i></td>
						<td><?= $hotel['vote'] ?></td>
						<td><?= $hotel['distance_to_center'] ?></td>
					</tr><?php
				} ?>
			</tbody>
		</table>
    </div>

    
</body>
</html>