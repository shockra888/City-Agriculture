var passedArray = <?php ?>;

var yValues = ["Alos", "Amandiego", "Amangbangan", "Balangobong", "Balayang", "Bisocol", "Bolaney", "Baleyadaan", "Bued", "Cabatuan", "Cayucay"
        , "Dulacac", "Inerangan", "Landoc", "Linmansangan", "Lucap", "Maawi", "Macatiw", "Magsaysay", "Mona", "Palamis", "Pandan", "Pangapisan", "Poblacion", "Pocal-Pocal"
        , "Pogo", "Polo", "Quibuar", "Sabangan", "San Antonio", "San Jose", "San Roque", "San Vicente", "Santa Maria", "Tanaytay", "Tangcarang", "Tawintawin", "Telbang"
        , "Victoria"];
        var xValues = [55, 49, 44, 24, 100,0.7];
        var barColors = ["brown", "brown","brown","brown","brown","brown", "brown","brown","brown","brown","brown", "brown","brown","brown","brown",
        "brown", "brown","brown","brown","brown","brown", "brown","brown","brown","brown","brown", "brown","brown","brown","brown","brown", "brown","brown","brown","brown",
        "brown", "brown","brown","brown"];

        new Chart("myChart", {
        type: "bar",
        data: {
            labels: yValues,
            datasets: [{
            backgroundColor: barColors,
            data: xValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Farmers Population"
            }
        }
        });