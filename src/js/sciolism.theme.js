/**
 * [Event listeners to handle resizing of header during scrolling]
 */


document.addEventListener("scroll", function() {
	header = document.querySelector("header");

	if (window.pageYOffset > 0){
		header.classList.add("small");
		header.classList.remove("fullSize");
	} else {
		header.classList.add("fullSize");
		header.classList.remove("small");
	}
});

document.addEventListener("DOMContentLoaded", function() {
	footnoteAnchors = document.querySelectorAll('a[href^="#"]');

	Array.from(footnoteAnchors).forEach( function(element) {
		element.addEventListener('click', function() {
			window.setTimeout( function() {
				window.scrollTo(window.pageXOffset, window.pageYOffset - 100);
		  }, 0 );
		});
	} );
});
