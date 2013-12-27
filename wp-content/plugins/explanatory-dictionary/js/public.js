(function ($) {
	"use strict";
	$(function () {
		// Place your public-facing JavaScript here
		
		$(".explanatory-dictionary-highlight").mouseenter(function(){
			if( $(this).children(".explanatory-dictionary-tooltip").is(":animated") == false ) {
			
				// load the content in
				var definitionTarget = $(this).attr('data-definition');
				
				var contentTooltip = $(this).find(".explanatory-dictionary-tooltip-content");
				contentTooltip.empty();
				$("#explanatory-dictionary-page_definitions dt." + definitionTarget).clone().appendTo(contentTooltip);
				$("#explanatory-dictionary-page_definitions dd." + definitionTarget).clone().appendTo(contentTooltip);
				
				// fade in
				$(this).children(".explanatory-dictionary-tooltip").fadeIn(200);
				
				// fade out
				$(this).click(function(){
					$(this).children(".explanatory-dictionary-tooltip").fadeOut(200);
				});
				
				$(this).children(".explanatory-dictionary-tooltip").click(function(){
					$(this).fadeOut(200);
				});
				
			}
		});

		// fade out
		$(".explanatory-dictionary-highlight").mouseleave(function(){
			$(this).children(".explanatory-dictionary-tooltip").fadeOut(200);

		});
	});
}(jQuery));