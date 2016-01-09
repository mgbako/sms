(function($){

	$.fn.customPaginate = function(options){

		$(".finish").hide();
		var paginationContainer = this;
		var itemsToPaginate;
		var linkNumber;

<<<<<<< HEAD
		$('.previousLink').on('click', function(){

			var pageLinks = $("paginate li");
			linkNumber--;

			if(linkNumber == 0){
				linkNumber = pageLinks.length;
			}

			var previousLink = pageLinks.filter(".activeLink").prev();
			if(previousLink.length == 0){
				previousLink = pageLinks.last();
			}

			previousLink.trigger("click");
		});

		$('.nextLink').on('click', function(){

			var pageLinks = $("paginate li");
			linkNumber++;

			if(linkNumber > pageLinks.length){
				linkNumber = 1;
			}

			var nextLink = pageLinks.filter(".activeLink").next();
			if(nextLink.length == 0){
				nextLink = pageLinks.first();
			}

			nextLink.trigger("click");
		});

=======
		
>>>>>>> 2aea719a85c9720b25f830bf258fe3663f64ddd2
		var defaults = {
			itemsPerPage : 1
		};

		var settings = {};

		$.extend(settings, defaults, options);
		var itemsPerPage = settings.itemsPerPage;

		itemsToPaginate = $(settings.itemsToPaginate);
		var numberOfPaginationLinks = Math.ceil(itemsToPaginate.length / itemsPerPage);
		var current;

		$('<ul></ul>').prependTo(paginationContainer).addClass("pagination");

		for(var index=0; index<numberOfPaginationLinks; index++){
			paginationContainer.find("ul").append("<li><a>"+ (index+1) +"</a></li>");

		}

		itemsToPaginate.filter(":gt("+ (itemsPerPage - 1) +")").hide();

		var link = paginationContainer.find("ul li").on("click", function(){
			
			linkNumber = $(this).text();

<<<<<<< HEAD
=======
			$('.number').text(linkNumber);
			
>>>>>>> 2aea719a85c9720b25f830bf258fe3663f64ddd2
			var itemsToHide = itemsToPaginate.filter(":lt("+ (linkNumber * itemsPerPage - 1) +")");
			$.merge(itemsToHide, itemsToPaginate.filter(":gt("+ ((linkNumber * itemsPerPage) - 1) +")"));
			itemsToHide.hide();

			var itemsToShow = itemsToPaginate.not(itemsToHide);
			itemsToShow.show();


			if(index+1 == linkNumber){
				link.addClass("activeLink");
				link.siblings().removeClass("activeLink");
			}
			
<<<<<<< HEAD
			$('#total').text(linkNumber + "/"+numberOfPaginationLinks);
=======
			//$('#total').text(linkNumber + "/"+numberOfPaginationLinks);
			
>>>>>>> 2aea719a85c9720b25f830bf258fe3663f64ddd2

			if(linkNumber == numberOfPaginationLinks){
				$(".finish").show();
			}
			else
				$(".finish").hide();

			
		});


<<<<<<< HEAD
=======


>>>>>>> 2aea719a85c9720b25f830bf258fe3663f64ddd2
		
	}

}(jQuery));