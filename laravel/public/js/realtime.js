$(document).ready(function(){

    setInterval(function () {
        console.log('Ready for next..');

        //appel ajax
        $.ajax({
            url: $('#panelajax').attr('data-url')
        }).done(function(data){
            $('#dashboard-support-tickets').html(data);
        });

    }, 3000);

});
















