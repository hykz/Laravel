$(document).ready(function(){


	/**
	 * 1ere méthode en GET
	 */

		//ciblage de lelement + evenement dessus
	$('table#list .btn-danger').click(function(e){
		e.preventDefault(); //annuler l'évenemnt href de mes liens
		console.log('vous avez cliquez dessus :)');

		// je recuoere le liens sur lequel j'ai cliquez
		var elt = $(this);

		//moduel ajax
		$.ajax({
			url: elt.attr('href') //url de mon href du lien sur lequel j'ai cliquez
		}).done(function() {
			elt.parents('tr').fadeOut('slow');
		});


	});



	// Ciblage de mon bon element
	// + Greffage de mon événement
	$('#actionslist').change(function(e){

		console.log('Coucou, tu veux mon projet?');
		var selection = $(this).val();
		// recupere la vaeur de 'option selectonné
		console.log(selection);

		//si je veux supprimer (option 1)
		if(selection == "1"){

			// boucle en jquery : pour chaque bouton coché
			$('#list :checked').each(function(index){

				var elt = $(this);

				// Envoyer une requete ajax de suppression
				// pour chaque film coché
				$.ajax({
					url: elt.attr('data-url') //url de mon href du lien sur lequel j'ai cliquez
				}).done(function() {
					elt.parents('tr').fadeOut('slow');
				});



			});

		}

	});


	/**
	 * e : Evenement
	 */
	$('form#addcomment').submit(function(e){
		e.preventDefault();
		console.log('Mon evenement!');

		var elt = $(this);

		console.log(elt);
		console.log(elt.attr('action'));
		console.log(elt.serialize());

		//if($("#toto").length > 0)

		//
		$.ajax({
			url: elt.attr('action'),
			method: "POST", // Methode d'envoi de ma requete
			data: elt.serialize()
			// data: envoyer des données
		}).done(function(data) {
			//console.log(data.reponse);
			var html = '<li>' + elt.find('textarea').val() + '</li>';
			elt.parents('#content-wrapper').find('ul:last').append(html);
			elt.find('textarea').val("");
		});
		console.log('coucou');

	});


	$('form#addMovie').submit(function(e){
		e.preventDefault();
		console.log('Mon evenement!');

		var elt = $(this);

		console.log(elt);
		console.log(elt.attr('action'));
		console.log(elt.serialize());


		$.ajax({
			url: elt.attr('action'),
			method: "POST", // Methode d'envoi de ma requete
			data: elt.serialize()
			// data: envoyer des données
		}).done(function() {
			elt.parents('.panel').fadeOut('slow');
			$.growl.warning({ title: "Bravo!", message: "Film ajouté!", duration: 5000 });

		});
		console.log('coucou');


	});




	init.push(function () {
		// Easy Pie Charts
		var easyPieChartDefaults = {
			animate: 2000,
			scaleColor: false,
			lineWidth: 6,
			lineCap: 'square',
			size: 90,
			trackColor: '#e5e5e5'
		}
		$('#easy-pie-chart-1').easyPieChart($.extend({}, easyPieChartDefaults, {
			barColor: PixelAdmin.settings.consts.COLORS[1]
		}));
		$('#easy-pie-chart-2').easyPieChart($.extend({}, easyPieChartDefaults, {
			barColor: PixelAdmin.settings.consts.COLORS[1]
		}));
		$('#easy-pie-chart-3').easyPieChart($.extend({}, easyPieChartDefaults, {
			barColor: PixelAdmin.settings.consts.COLORS[1]
		}));
	});











});
















