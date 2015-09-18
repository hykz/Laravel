init.push(function () {


    ///// ACTORS BY CITY GRAPH

    var arr = [];
    $('.graphact').each(function(){
        var o = { device: $(this).attr('data-content') , geekbench: $(this).attr('data-count')};
        arr.push(o);
        return arr;

    });


    Morris.Bar({
        element: 'hero-bar',
        data: arr

        ,
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ["Nombre d'acteurs"],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: PixelAdmin.settings.consts.COLORS,
        gridLineColor: '#cfcfcf',
        resize: true
    });

    //// CHEESE GRAPH AGE

    var young = [];
    var youngy = [];
    var oldboy = [];
    var masterold = [];
    var yoda = [];

    $('.actche').each(function(){
        var check = parseInt($(this).attr('data-content'));

    if ( 18 <= check && check  <= 25) {
        young.push(check)
    }
    else if ( 25 < check && check < 35) {
            youngy.push(check)
        }
    else if ( 35 <= check && check <= 45) {
        oldboy.push(check)
    }
    else if ( 45 < check && check <= 60) {
        masterold.push(check)
    }
    else if ( 60 < check) {
        yoda.push(check)
    }
    });



   var allact = young.length + youngy.length + oldboy.length + masterold.length + yoda.length;


    var tranche1 = Math.round(young.length * 100 / allact);
    var tranche2 = Math.round(youngy.length * 100 / allact);
    var tranche3 = Math.round(oldboy.length * 100 / allact);
    var tranche4 = Math.round(masterold.length * 100 / allact);
    var tranche5 = Math.round(yoda.length * 100 / allact);



    Morris.Donut({
        element: 'hero-donut',
        data: [
            { label: '18-25', value: tranche1 },
            { label: '25-35', value: tranche2 },
            { label: '35-45', value: tranche3 },
            { label: '45-60', value: tranche4 },
            { label: '60+', value: tranche5 }
        ],
        colors: PixelAdmin.settings.consts.COLORS,
        resize: true,
        labelColor: '#888',
        formatter: function (y) { return y + "%" }
    });

    //////////////// ' BEST REAL GRAPH

    var labels = [];
    var first = [];
    var second = [];
    var third = [];
    var four = [];
    var five = [];


    $('bestreal').each(function(){
        var o = $(this).attr('data-firstname') + ' ' + $(this).attr('data-lastname');
        labels.push(o);

        var p = $(this).attr('data-firstpoint');
        var q = $(this).attr('data-secondpoint');
        var r = $(this).attr('data-thirdpoint');
        var s = $(this).attr('data-fourpoint');
        var t = $(this).attr('data-fivepoint');

        first.push(p);
        second.push(q);
        third.push(r);
        four.push(s);
        five.push(t);


        return labels;

    });


    var timz = ['2015', '2015 Q1', '2015 Q2', '2015 Q3', '2015 Q4'];



    Morris.Area({
        element: 'hero-area',
        data: [
            { period: timz[0], real1: first[0], real2: first[1], real3: first[2] , real4: first[3]  },
            { period: timz[1], real1: second[0], real2: second[1], real3: second[2] , real4: second[3]  },
            { period: timz[2], real1: third[0], real2: third[1], real3: third[2] , real4: third[3]  },
            { period: timz[3], real1: four[0], real2: four[1], real3: four[2] , real4: four[3]  },
            { period: timz[4], real1: five[0], real2: five[1], real3: five[2] , real4: five[3]  }
        ],
        xkey: 'period',
        ykeys: ['real1', 'real2', 'real3', 'real4'],
        labels: labels,
        hideHover: 'auto',
        lineColors: PixelAdmin.settings.consts.COLORS,
        fillOpacity: 0.3,
        behaveLikeLine: true,
        lineWidth: 2,
        pointSize: 4,
        gridLineColor: '#cfcfcf',
        resize: true
    });


});
