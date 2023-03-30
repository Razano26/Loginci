<!-- Setup des variablel -->
    <?php

        if(isset($_GET['date'])){
            $date = $_GET['date'];
        } else {
            $date = date("Y");
        }

    ?>
<!-- Ensemble des tableau -->

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
            ['Type', 'Effectif']
            <?php 
                $data_type = graph_type($date);

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
                $data_type_detect = graph_type_detect($date);

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
                $data_result = graph_result($date);

                foreach ($data_result as $element) {
                    $Name_Results = str_replace("'","\'",$element['Name_Results']);
                    echo ",['".$Name_Results."',".$element['nb']."]";
                }
            ?>
            ]);

            var options = {
            chart: {
                title: 'Résultat des attaques',
                legend: { position: 'none' },
                backgroundColor: 'black',
                
            }
            };

            var chart = new google.charts.Bar(document.getElementById('graph_result'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

<!-- Page -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-4">
                <form action="" method="$_POST">
                    <input type="hidden" name="page" value="1">
                    <div class="input-group">
                        <select name="date" id="date" class="form-select">
                            <?php 
                                $listedate = get_list_annee();
                                foreach($listedate as $annee){
                                    if($annee['list'] == $date){
                                        echo '<option value='.$annee['list'].' selected>'.$annee['list'].'</option>';
                                    } else {
                                        echo '<option value='.$annee['list'].'>'.$annee['list'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-warning">Valider</button>
                    </div>
                </form>
                
            </div> 
            <div class="col-3">
                <a href="include/Export/pdf.php?date=<?php echo($date); ?>" target="_blank" rel="noopener noreferrer" type="button" class="btn btn-outline-warning">
                    <i class="bi bi-printer"></i>
                </a>
            </div>
            
        </div>

        <hr class="text-light">

        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body bg-secondary">
                        <div id="graph_type" style="height: 16em;"></div>
                    </div>
                </div>
            </div>
            <div class="col-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $data_type = graph_type($date);

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
        </div>

        <hr class="text-light">

        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body bg-secondary">
                        <div id="graph_type_detect" style="height: 16em;"></div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Type de detection</th>
                        <th scope="col">Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data_type_detect = graph_type_detect($date);

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
        </div>

        <hr class="text-light">

        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body bg-secondary">
                        <div id="graph_result" style="height: 16em;"></div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Résultat</th>
                            <th scope="col">Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data_type_detect = graph_result($date);

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

    </div>