<?php
define('IN_SCRIPT', 1);
define('HESK_PATH', './');

require(HESK_PATH . 'hesk_settings.inc.php');
require(HESK_PATH . 'inc/common.inc.php');
require(HESK_PATH . 'inc/statistic.inc.php');
if (!defined('IN_SCRIPT')) {
    die();
}
define('TEMPLATE_PATH', HESK_PATH . "theme/{$hesk_settings['site_theme']}/");
require_once(TEMPLATE_PATH . 'customer/util/alerts.php');
require_once(TEMPLATE_PATH . 'customer/util/kb-search.php');
require_once(TEMPLATE_PATH . 'customer/util/rating.php');
//hesk_load_database_functions();

//hesk_dbConnect();
getStatisticData();
//echo json_encode(array('result' => getStatisticData()));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>

    </title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/all.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/animate.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/stellarnav.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/pignose.calendar.min.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/fonts/stylesheet.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/style.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH; ?>customer/css/responsive.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 510px;
            max-width: 900px;
            margin: 1em auto;
        }

        #container {
            height: 600px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>

</head>

<body>
    <div style="text-align:center">
        <label style="font-size:14" for="filter-tahun">Pilih tahun:</label>
        <select class="col-sm-2 col-form-control" name="filter-tahun" id="filter-tahun">
            <option value="2022">2022</option>
            <option value="2023" selected>2023</option>
        </select>
        <button style="margin-top:10px" class="btn-primary" onclick="pilihTahun()">Pilih</button>
    </div>
    <figure class="highcharts-figure">
        <div id="statistik-tahunan-2023"></div>
        <!-- <p class="highcharts-description">
            All color options in Highcharts can be defined as gradients or patterns.
            In this chart, a gradient fill is used for decorative effect in a pie
            chart.
        </p> -->
    </figure>

    <figure class="highcharts-figure">
        <div id="statistik-bulanan-2023"></div>
        <!-- <p class="highcharts-description">
            A basic column chart comparing emissions by pollutant.
            Oil and gas extraction has the overall highest amount of
            emissions, followed by manufacturing industries and mining.
            The chart is making use of the axis crosshair feature, to highlight
            years as they are hovered over.
        </p> -->
    </figure>

    <figure class="highcharts-figure">
        <div id="statistik-bulanan-2023-time"></div>
        <!-- <p class="highcharts-description">
             Chart showing a combination of a column and a line chart, using multiple
            y-axes. Using multiple axes allows for data within different ranges to
            be visualized together.
        </p> -->
    </figure>

    <figure class="highcharts-figure">
        <div style="display:none" id="statistik-tahunan-2022"></div>
        <!-- <p class="highcharts-description">
            All color options in Highcharts can be defined as gradients or patterns.
            In this chart, a gradient fill is used for decorative effect in a pie
            chart.
        </p> -->
    </figure>

    <figure class="highcharts-figure">
        <div style="display:none" id="statistik-bulanan-2022"></div>
        <!-- <p class="highcharts-description">
            A basic column chart comparing emissions by pollutant.
            Oil and gas extraction has the overall highest amount of
            emissions, followed by manufacturing industries and mining.
            The chart is making use of the axis crosshair feature, to highlight
            years as they are hovered over.
        </p> -->
    </figure>

    <figure class="highcharts-figure">
        <div style="display:none" id="statistik-bulanan-2022-time"></div>
        <!-- <p class="highcharts-description">
             Chart showing a combination of a column and a line chart, using multiple
            y-axes. Using multiple axes allows for data within different ranges to
            be visualized together.
        </p> -->
    </figure>

</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    Highcharts.chart('statistik-bulanan-2023-time', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Rata-rata Waktu Penyelesaian Per Tiket, 2023.',
            align: 'center'
        },
        subtitle: {
            text: 'Rata-rata waktu penyelesaian tiket pengaduan.',
            align: 'center'
        },
        xAxis: [{
            labels: {
                /*    format: '{value}°C', */
                style: {
                    color: Highcharts.getOptions().colors[1],
                    fontSize: '12px'
                }
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} Menit',
                style: {
                    color: Highcharts.getOptions().colors[1],
                    fontSize: '12px'
                }
            },
            title: {
                text: 'Waktu Penyelesaian',
                style: {
                    color: Highcharts.getOptions().colors[1],
                    fontSize: '12px'
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Tiket Terselesaikan',
                style: {
                    color: Highcharts.getOptions().colors[0],
                    fontSize: '12px'
                }
            },
            labels: {
                /*  format: '{value} mm', */
                style: {
                    color: Highcharts.getOptions().colors[0],
                    fontSize: '12px'
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold',
                fontSize: '10px'
            },
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 60,
            floating: true,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || // theme
                'rgba(255,255,255,0.25)'
        },
        series: [{
            name: 'Tiket Terselesaikan',
            type: 'column',
            yAxis: 1,
            data: [65, 86, 56, 24, 42, 6, 0, 0, 0,
                0, 0, 0],
            tooltip: {
                /*  valueSuffix: ' mm' */
            }

        }, {
            name: 'Rata-rata Waktu Penyelesaian',
            type: 'spline',
            data: [24, 14, 13, 22, 20, 110, 0, 0, 0,
                0, 0, 0],
            tooltip: {
                valueSuffix: 'Menit'
            }
        }]
    });
</script>

<script>
    Highcharts.chart('statistik-bulanan-2022-time', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Rata-rata Waktu Penyelesaian Per Tiket, 2023.',
            align: 'center'
        },
        subtitle: {
            text: 'Rata-rata waktu penyelesaian tiket pengaduan.',
            align: 'center'
        },
        xAxis: [{
            labels: {
                /*    format: '{value}°C', */
                style: {
                    color: Highcharts.getOptions().colors[1],
                    fontSize: '12px'
                }
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} Menit',
                style: {
                    color: Highcharts.getOptions().colors[1],
                    fontSize: '12px'
                }
            },
            title: {
                text: 'Waktu Penyelesaian',
                style: {
                    color: Highcharts.getOptions().colors[1],
                    fontSize: '12px'
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Tiket Terselesaikan',
                style: {
                    color: Highcharts.getOptions().colors[0],
                    fontSize: '12px'
                }
            },
            labels: {
                /*  format: '{value} mm', */
                style: {
                    color: Highcharts.getOptions().colors[0],
                    fontSize: '12px'
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold',
                fontSize: '10px'
            },
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 60,
            floating: true,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || // theme
                'rgba(255,255,255,0.25)'
        },
        series: [{
            name: 'Tiket Terselesaikan',
            type: 'column',
            yAxis: 1,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 22,
                65, 56, 76],
            tooltip: {
                /*  valueSuffix: ' mm' */
            }

        }, {
            name: 'Rata-rata Waktu Penyelesaian',
            type: 'spline',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 5,
                14, 77, 59],
            tooltip: {
                valueSuffix: 'Menit'
            }
        }]
    });
</script>

<script>
    Highcharts.chart('statistik-bulanan-2023', {
        chart: {
            type: 'column'
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold',
                fontSize: '12px'
            }
        },
        title: {
            text: 'Jumlah Tiket Per-Bulan 2023',
            style: {
                fontSize: '20px'
            }

        },
        subtitle: {
            text: 'Tiket masuk, belum terselesaikan dan sudah terselesaikan.',
            style: {
                fontSize: '12px'
            }
        },
        xAxis: {
            labels: {
                style: {
                    fontSize: '12px'
                }
            },
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            labels: {
                style: {
                    fontSize: '12px'
                }
            },
            title: {
                text: 'Jumlah Tiket',
                style: {
                    fontWeight: 'bold',
                    fontSize: '12px'
                }
            },
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
            }
        },
        series: [{
            name: 'Tiket',
            data: [75, 101, 60, 35, 56, 12, 0, 0, 0, 0, 0, 0]

        }, {
            name: 'Belum Terselesaikan',
            data: [10, 15, 4, 11, 14, 6, 0, 0, 0, 0, 0, 0]

        }, {
            name: 'Sudah Terselesaikan',
            data: [65, 86, 56, 24, 42, 6, 0, 0, 0, 0, 0, 0]

        }]
    });
</script>

<script>
    // Data retrieved from https://netmarketshare.com/
    // Radialize the colors
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('statistik-tahunan-2023', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Persentase Jumlah Tiket Per Kategori 2023',
            align: 'center',
            style: {
                fontSize: '20px'
            }
        },
        tooltip: {
            style: {
                fontSize: '14px'
            },
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    connectorColor: 'silver'
                },
            }
        },
        series: [{
            name: 'Tiket',
            dataLabels: {
                style: {
                    fontSize: '12px'
                }
            },
            data: [
                { name: 'Admisi', y: 4.424778761 },
                { name: 'Akademik', y: 21.23893805 },
                { name: 'Kemahasiswaan', y: 0.8849557522 },
                { name: 'Laporan Gratifikasi', y: 0 },
                { name: 'Email, Internet dan Aplikasi', y: 51.03244838 },
                { name: 'Keuangan', y: 3.244837758 },
                { name: 'Mahad', y: 0 },
                { name: 'F Saintek', y: 2.949852507 },
                { name: 'FKIK', y: 0.2949852507 },
                { name: 'FITK', y: 0 },
                { name: 'F Ekonomi', y: 0.2949852507 },
                { name: 'F Syariah', y: 0.2949852507 },
                { name: 'F Psikologi', y: 0 },
                { name: 'F Humaniora', y: 0 },
                { name: 'Pascasarjana', y: 0.5899705015 },
                { name: 'LP2M', y: 0 },
                { name: 'Perpustakaan', y: 1.769911504 },
                { name: 'E-Journal', y: 0 },
                { name: 'Sarana dan prasarana', y: 2.064896755 },
                { name: 'Humas', y: 0 },
                { name: 'PTIPD User Hotspot', y: 1.179941003 },
                { name: 'PTIPD Problem Web', y: 4.424778761 },
                { name: 'P3SR', y: 0 },
                { name: 'Lain-Lain', y: 3.83480826 },
            ]
        }]
    });
</script>

<script>
    Highcharts.chart('statistik-bulanan-2022', {
        chart: {
            type: 'column'
        },
        legend: {
            itemStyle: {
                fontWeight: 'bold',
                fontSize: '12px'
            }
        },
        title: {
            text: 'Jumlah Tiket Per-Bulan 2022',
            style: {
                fontSize: '20px'
            }

        },
        subtitle: {
            text: 'Tiket masuk, belum terselesaikan dan sudah terselesaikan.',
            style: {
                fontSize: '12px'
            }
        },
        xAxis: {
            labels: {
                style: {
                    fontSize: '12px'
                }
            },
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Jun',
                'Jul',
                'Agu',
                'Sep',
                'Okt',
                'Nov',
                'Des'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            labels: {
                style: {
                    fontSize: '12px'
                }
            },
            title: {
                text: 'Jumlah Tiket',
                style: {
                    fontWeight: 'bold',
                    fontSize: '12px'
                }
            },
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
            }
        },
        series: [{
            name: 'Tiket',
            data: [1, 2, 1, 0, 0, 0, 0, 0, 0, 67, 57, 76]

        }, {
            name: 'Belum Terselesaikan',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 0]

        }, {
            name: 'Sudah Terselesaikan',
            data: [1, 2, 1, 0, 0, 0, 0, 0, 0, 65, 56, 76]

        }]
    });
</script>

<script>
    // Data retrieved from https://netmarketshare.com/
    // Radialize the colors
    // Build the chart
    Highcharts.chart('statistik-tahunan-2022', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Persentase Tiket Per Kategori 2022',
            align: 'center',
            style: {
                fontSize: '20px'
            }
        },
        tooltip: {
            style: {
                fontSize: '14px'
            },
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    connectorColor: 'silver'
                },
            }
        },
        series: [{
            name: 'Tiket',
            dataLabels: {
                style: {
                    fontSize: '12px'
                }
            },
            data: [
                { name: 'Admisi', y: 2.212389381 },
                { name: 'Akademik', y: 5.752212389 },
                { name: 'Kemahasiswaan', y: 0 },
                { name: 'Laporan Gratifikasi', y: 0 },
                { name: 'Email, Internet dan Aplikasi', y: 82.30088496 },
                { name: 'Keuangan', y: 0.4424778761 },
                { name: 'Mahad', y: 0 },
                { name: 'F Saintek', y: 0.4424778761 },
                { name: 'FKIK', y: 0 },
                { name: 'FITK', y: 0.4424778761 },
                { name: 'F Ekonomi', y: 0 },
                { name: 'F Syariah', y: 0.4424778761 },
                { name: 'F Psikologi', y: 0 },
                { name: 'F Humaniora', y: 0 },
                { name: 'Pascasarjana', y: 0.4424778761 },
                { name: 'LP2M', y: 0.8849557522 },
                { name: 'Perpustakaan', y: 1.769911504 },
                { name: 'E-Journal', y: 0 },
                { name: 'Sarana dan prasarana', y: 1.327433628 },
                { name: 'Humas', y: 0 },
                { name: 'PTIPD User Hotspot', y: 1.327433628 },
                { name: 'PTIPD Problem Web', y: 0 },
                { name: 'P3SR', y: 0 },
                { name: 'Lain-Lain', y: 2.212389381 },
            ]
        }]
    });
</script>

<script>
    function pilihTahun() {
        var statistikTahunan2023 = document.getElementById("statistik-tahunan-2023");
        var statistikBulanan2023 = document.getElementById("statistik-bulanan-2023");
        var statistik_bulanan_2023_time = document.getElementById("statistik-bulanan-2023-time");
        var statistikTahunan2022 = document.getElementById("statistik-tahunan-2022");
        var statistikBulanan2022 = document.getElementById("statistik-bulanan-2022");
        var statistik_bulanan_2022_time = document.getElementById("statistik-bulanan-2022-time");
        if (document.getElementById('filter-tahun').value == "2023") {

            /* if (statistikTahunan2023.style.display === "none") {
                statistikTahunan2023.style.display = "block";
                statistikBulanan2023.style.display = "block";
            } else {
                statistikTahunan2023.style.display = "none";
                statistikBulanan2023.style.display = "none";
            } */
            statistikTahunan2023.style.display = "block";
            statistikBulanan2023.style.display = "block";
            statistik_bulanan_2023_time.style.display = "block";
            statistikTahunan2022.style.display = "none";
            statistikBulanan2022.style.display = "none";
            statistik_bulanan_2022_time.style.display = "none";
        }
        else if (document.getElementById('filter-tahun').value == "2022") {
            /*  if (statistikTahunan2022.style.display === "none") {
                 statistikTahunan2022.style.display = "block";
                 statistikBulanan2022.style.display = "block";
             } else {
                 statistikTahunan2022.style.display = "none";
                 statistikBulanan2022.style.display = "none";
             } */
            statistikTahunan2022.style.display = "block";
            statistikBulanan2022.style.display = "block";
            statistik_bulanan_2022_time.style.display = "block";
            statistikTahunan2023.style.display = "none";
            statistikBulanan2023.style.display = "none";
            statistik_bulanan_2023_time.style.display = "none";
        }

    }
</script>

</html>