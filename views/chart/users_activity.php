<?php

defined('C5_EXECUTE') or die('Access Denied.');

/** @var array $labels */
/** @var array $data */

if (count($data)  === 1) {
    // Not enough data
    return;
}
?>

<div class="chart-container">
    <canvas id="usersActivityChart"></canvas>
</div>

<header>
    <?php
    echo t('Number of users last online');
    ?>
</header>

<script>
    $(document).ready(function() {
        var json = <?php echo json_encode($data); ?>;

        var ctx = $('#usersActivityChart').get(0).getContext('2d');

        var data = json.map(function(e) {
            return {
                x: new Date(e.year, e.month),
                y: e.users
            }
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [{
                    backgroundColor: 'rgba(255, 99, 132, .5)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1,
                    data: data
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        type: 'time',
                        parser: 'MM YYYY'
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: '<?php echo t('Number of Users') ?>'
                        }
                    }]
                }
            }
        });
    });
</script>
