<!DOCTYPE html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Loginci</title>
    <link rel="shortcut icon" type="image/png" href="../../favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<!-- Setup des variablel -->
    <?php

        if(isset($_GET['date'])){
            $date = $_GET['date'];
        } else {
            $date =2022;
        }
        include '../function.php';

    ?>
<!-- Ensemble des tableau -->

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
            ['Type', 'Effectif']
            <?php 
                $data_type = graph_type_p($date);

                foreach ($data_type as $element) {
                    $Name_type = str_replace("'","\'",$element['Name_type']);
                    echo ",['".$Name_type."',".$element['nb']."]";
                }
            ?>
            ]);

            var options = {
            title: 'Type des attaques',
            is3D: true,
            backgroundColor: 'transparent'
            };

            var chart = new google.visualization.PieChart(document.getElementById('graph_type'));

            chart.draw(data, options);
        }
        </script>
    <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                ['Type', 'Effectif']
                <?php 
                    $data_type_detect = graph_type_detect_p($date);

                    foreach ($data_type_detect as $element) {
                        echo ",['".$element['Name_Detection']."',".$element['nb']."]";
                    }
                ?>
                ]);

                var options = {
                title: 'Type des Detection',
                is3D: true,
                backgroundColor: 'transparent'
                };

                var chart = new google.visualization.PieChart(document.getElementById('graph_type_detect'));

                chart.draw(data, options);
            }
        </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Resultat', 'Quantité']
            <?php 
                $data_result = graph_result_p($date);

                foreach ($data_result as $element) {
                    $Name_Results = str_replace("'","\'",$element['Name_Results']);
                    echo ",['".$Name_Results."',".$element['nb']."]";
                }
            ?>
            ]);

            var options = {
            chart: {
                title: 'Résultat des attaques',
                legend: { position: 'none' }
                
            }
            };

            var chart = new google.charts.Bar(document.getElementById('graph_result'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
        </script>

<!-- Page -->

    <body>
    <div class="container-fluid bg-light">

    <div class="row">
        <h1>Statistique sur la sécurité de l'entreprise - <?php echo($date); ?></h1>
    </div>

    <br/>
        <hr class="text-light">
    <br/>
        
        <!--
        <div class="row">
            <div class="col-4">
                <form action="" method="$_POST">
                    <input type="hidden" name="page" value="1">
                    <div class="input-group">
                        <select name="date" id="date" class="form-select">
                            <?php /*
                                $listedate = get_list_annee();
                                foreach($listedate as $annee){
                                    if($annee['list'] == $date){
                                        echo '<option value='.$annee['list'].' selected>'.$annee['list'].'</option>';
                                    } else {
                                        echo '<option value='.$annee['list'].'>'.$annee['list'].'</option>';
                                    }
                                }*/
                            ?>
                        </select>
                        <button type="submit" class="btn btn-warning">Valider</button>
                    </div>
                </form>
            </div>
        </div>

        <br/>
        <hr class="text-light">
        <br/>-->

        <div class="row">
                <div class="">
                    <div class="card-body bg-secondary">
                        <div id="graph_type" style="height: 24em; width: 60em;"></div>
                    </div>
                </div>
        </div>
        <br/>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $data_type = graph_type_p($date);

                        foreach ($data_type as $element) {
                            echo '<tr>';
                                echo '<td>'.$element['Name_type'].'</td>';
                                echo '<td>'.$element['nb'].'</td>';
                            echo '</tr>';                
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <br/>
        <hr class="text-light">

        <div class="row">
            <div class="">
                <div class="card-body bg-secondary">
                    <div id="graph_type_detect" style="height: 24em; width: 60em;"></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Type de detection</th>
                    <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data_type_detect = graph_type_detect_p($date);

                        foreach ($data_type_detect as $element) {
                            echo '<tr>';
                                echo '<td>'.$element['Name_Detection'].'</td>';
                                echo '<td>'.$element['nb'].'</td>';
                            echo '</tr>';                
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <br/>
        <hr class="text-light">

        <div class="row">
            <div class="">
                <div class="card-body bg-secondary">
                    <div id="graph_result" style="height: 24em; width: 60em;"></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Résultat</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data_type_detect = graph_result_p($date);

                        foreach ($data_type_detect as $element) {
                            echo '<tr>';
                                echo '<td>'.$element['Name_Results'].'</td>';
                                echo '<td>'.$element['nb'].'</td>';
                            echo '</tr>';                
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    </body>
<!-- On imprime est on rentre -->

    

<script type="text/javascript">
        setTimeout(window.print,1000);
</script>