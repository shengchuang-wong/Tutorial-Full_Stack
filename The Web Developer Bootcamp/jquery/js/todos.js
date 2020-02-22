// check off specific todos by clicking
$("ul").on("click", "li", function() {
	$(this).toggleClass("completed");
});

// click on X to delete Todo, to stop clicking other element like body, use stopPropagation();
$("ul").on("click", "span", function(e) {
	$(this).parent().fadeOut(500, function() {
		$(this).remove();
	});
	e.stopPropagation();
});

$("input[type='text']").keypress(function(e) {
	if(e.which === 13) {
		var todoText = $(this).val();
		$(this).val("");
		$("ul").append("<li><span><i class='fa fa-trash'></i></span> " + todoText + "</li>");
	}
});

$(".fa-plus").click(function() {
	$("input[type='text']").fadeToggle(400);
});