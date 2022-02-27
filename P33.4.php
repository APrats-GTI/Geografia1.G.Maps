<?php

session_start();

// echo $_POST['localidades'];
// echo "<br>";
// echo $_SESSION['comunidades'];
// echo "<br>";
// echo $_POST['municipios'];
// echo "<br>";

if (isset($_POST['municipios']) && isset($_SESSION['comunidades']) && isset($_SESSION['provincias'])){

    $municipio_id = $_POST['municipios'];
    $comunidad_id= $_SESSION['comunidades'];
    $provincia_id = $_SESSION['provincias'];
}

$mysqli = new mysqli('localhost', 'root', '', 'geografia2');

if ($mysqli->connect_errno){

    echo "<script> console.log('Error connecting to server, $mysqli->connect_errno: $mysqli->connect_error'); </script>";

    die(); //Finalitza l'script == Exit
  
}

echo "<script> console.log('Succesfully connected to the server'); </script>";


if (!$mysqli->set_charset("utf8")) { //Comprovar si la connexió es troba en utf-8 (Per a no liarla)

    echo "<script> console.log('Error loading character set utf8: %s\n', $mysqli->error); </script>";

    exit;

}


$sql = "SELECT c.comunidad AS comunidad, p.provincia AS provincia, m.municipio AS municipios, m.latitud AS latitud, m.longitud AS longitud
        FROM comunidades c JOIN provincias p ON c.id = p.comunidad_id
            JOIN municipios m ON p.id = m.provincia_id
        WHERE m.id = $municipio_id;";


$res = $mysqli->query($sql);


while ($rows = $res->fetch_all(MYSQLI_ASSOC)) { 

    //  print_r($rows);
    foreach ($rows as $row) {
        $show = "<div>
                    <p>$row[comunidad] : $row[provincia] : $row[municipios]</p>
                    <input type='hidden' id='latitud' value='$row[latitud]'>
                    <input type='hidden' id='longitud' value='$row[longitud]'> 
                </div>";
        // print_r($row['latitud']);
        // echo("<br>");
        // print_r($row['longitud']);
    }
    // print_r($show);
}

echo "<script> console.log('All queries OK!'); </script>";

$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <style>

        body {
            background-color: #F0F0F2;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 98vw;
            height: auto;
        }

        .items {
            background-color: #F2F2F2;
            text-align: center;
            border-radius: 3px;

            width: 75%;
            height: 75%;

            font-family: 'Lato', sans-serif;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        header {
            display: block;
            background-color: #A6A6A6;
            border-radius: 10px;
            margin: 2%;
            font-size: x-large;
            padding: 3%;
            /* border: 2px solid blue;  */
        }

        section {
            margin: 2%;
            border-radius: 10px;

            /* border: 2px solid red; */
        }

        p {
            padding: 5%;
            /* border: 2px solid yellow; */
            font-size: x-large;
        }

        hr {
            background-color: #F25C05;
            height: 2px;
        }

        .random-Words {
            margin: 3%;
        }

        .map-container {
            padding: 2%;
        }

        #map {
	        height: 600px;
	        width: 100%;
            border-radius: 5px;
        }

        .button1 {
            border-radius: 5px;
            background-color: #F27405;
            color: #F2F2F2;
            padding: 1%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: large;
            margin: 3%;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .button2 {
            border-radius: 5px;
            background-color: #D92929;
            color: #F2F2F2;
            padding: 1%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: large;
            margin: 3%;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
        }

        .buttonH:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }


    </style>
    <title>Geography</title>
</head>
<body>
    <div class="container">
        <div class="items">
            <header>
                    <h1>Summary</h1>
            </header>
            <section>

                <hr>

                <div class="result-item">
                    <?php
                        echo $show;
                    ?>
                </div>
                <div class="buttons">
                    <button onclick="window.location='P33.php';" class="button1 buttonH"value="click here">Start again</button>
                    <button onclick="history.back()" class="button2 buttonH">Go back</button>
                </div>
            </section>
            <div class="map-Container">
                <div id="map"></div>
            </div>
        </div>
        
        <script src="script.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=initMap&libraries=&v=weekly"
            async
        ></script>
    </div>
</body>
</html>