// JavaScript Document

jQuery(document).ready(function($) {
	"use strict";
	
	var answers = {};
	var thisq = '';
	var thisa = '';
	$('.answer-tile').click(function() {
		thisq = $(this).attr('data-key');
		thisa = $(this).attr('data-val');
		answers[thisq] = thisa;
		console.log(answers);
		$('.active').addClass('hiding');
		setTimeout(function() {
			$('.hiding').next().addClass('active');
			$('.hiding').removeClass('active hiding shown');
			setTimeout(function() {
				$('.active').addClass('shown');
			}, 300);
		}, 500);
		
	});
	
	$('.question-4').click(function() {
		$('.map-mock').addClass('active');
		setTimeout(function() {
			$('.map-mock').addClass('shown');
		}, 300);
	});
});