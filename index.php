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
    ]

  ];

  

  $data = $_GET;

  var_dump($data);

  // if(empty($data)) {
  //   $filter_hotels = $hotels;
  // }
  
  // else if($data['parking'] === 'false' && $data['vote'] === '') {
  //   $filter_hotels = $hotels;
  // }

  // else if ($data['parking'] === 'false' && $data['vote'] != '') {
  //   foreach($hotels as $hotel) {
  //     if($hotel['vote'] >= $data['vote']){
  //       $filter_hotels[] = $hotel;
  //     }
  //   }
  // }
  
  // else if ($data['parking'] === 'true' && $data['vote'] === '') {
  //   foreach($hotels as $hotel) {
  //     if($hotel['parking'] === true){
  //       $filter_hotels[] = $hotel;
  //     }
  //   }
  // }

  // else if ($data['parking'] === 'true' && $data['vote'] != '') {
  //   foreach($hotels as $hotel) {
  //     if($hotel['parking'] === true && $hotel['vote'] >= $data['vote']){
  //       $filter_hotels[] = $hotel;
  //     }
  //   }
  // }

  // Logica con array filter
  $filter_hotels = $hotels;

  if(!empty($data['parking']) || (isset($data['parking']) && empty($data['parking']) )) {
    $filter_hotels = array_filter($filter_hotels, fn($hotel) => $hotel['parking'] == $data['parking']); 
  }

  if(isset($data['vote']) && !empty($data['vote'])) {
    $filter_hotels = array_filter($filter_hotels, fn($hotel) => $hotel['vote'] >= $data['vote']);
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous'/>

  <title>PHP Hotel</title>
</head>
<body>

  <div class="container-xl mx-auto mt-5">

    <h1>PHP Hotel</h1>

    <form action="./index.php" method="GET" class="d-flex align-items-center mb-5">

      <div class="form-check me-3">
        <input class="form-check-input" type="radio" name="parking" value="">
        <label class="form-check-label">Senza parcheggio</label>
      </div>

      <div class="form-check me-5">
        <input class="form-check-input" type="radio" name="parking" value="1">
        <label class="form-check-label">Con parcheggio</label>
      </div>

      <div class="d-flex align-items-center me-5">
        <label class="form-label me-2 mb-0">Voto</label>
        <input type="number" class="form-control" name="vote">
      </div>

      <button type="submit" class="btn btn-primary me-2">Cerca</button>
      <button type="reset" class="btn btn-secondary">Annulla</button>

    </form>

    <table class="table table-dark table-striped">

      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Parcheggio</th>
          <th scope="col">Stelle</th>
          <th scope="col">Distanza dal centro</th>
        </tr>
      </thead>

      <tbody>

        <?php 

        foreach($filter_hotels as $hotel) {
          echo "<tr>";
          foreach($hotel as $key => $value) {
            if($key === 'parking' && $value === true) $value = 'SI';
            else if($key === 'parking' && $value === false) $value = 'NO';
            echo "<td>$value</td>";
          }
          echo "</tr>";
        } 
        
        ?>
 
      </tbody>

    </table>

  </div>
 
</body>
</html>