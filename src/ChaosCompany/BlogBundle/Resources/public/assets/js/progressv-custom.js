$(document).ready(function(){
	
/*==================== Progress-bar ====================*/ 

	$('.second.circle.progress-photoshop').circleProgress({
	   value: 0.90,
			size: 100,
			fill:{ gradient: [ ["#5bc98a", 1],["#5bc98a", 1],["#5bc98a", 1]] },
			thickness: 5,
			startAngle: 80
			
	}).on('circle-animation-progress', function(event, progress) {
		$(this).find('h3').html(parseInt(90 * progress));
	});

	$('.second.circle.progress-illustrator').circleProgress({
	   value: 0.82,
			size: 100,
			fill:{ gradient: [ ["#5bc98a", 1],["#5bc98a", 1],["#5bc98a", 1]] },
			thickness: 5,
			startAngle: 80
			
	}).on('circle-animation-progress', function(event, progress) {
		$(this).find('h3').html(parseInt(82 * progress));
	});

	$('.second.circle.progress-indesign').circleProgress({
	   value: 0.75,
			size: 100,
			fill:{ gradient: [ ["#5bc98a", 1],["#5bc98a", 1],["#5bc98a", 1]] },
			thickness: 5,
			startAngle: 80
			
	}).on('circle-animation-progress', function(event, progress) {
		$(this).find('h3').html(parseInt(75 * progress));
	});
	
	$('.second.circle.progress-html').circleProgress({
	   value: 0.65,
			size: 100,
			fill:{ gradient: [ ["#5bc98a", 1],["#5bc98a", 1],["#5bc98a", 1]] },
			thickness: 5,
			startAngle: 80
			
	}).on('circle-animation-progress', function(event, progress) {
		$(this).find('h3').html(parseInt(65 * progress));
	});

	$('.second.circle.progress-wordpress').circleProgress({
	   value: 0.85,
			size: 100,
			fill:{ gradient: [ ["#5bc98a", 1],["#5bc98a", 1],["#5bc98a", 1]] },
			thickness: 5,
			startAngle: 80
			
	}).on('circle-animation-progress', function(event, progress) {
		$(this).find('h3').html(parseInt(85 * progress));
	});
});