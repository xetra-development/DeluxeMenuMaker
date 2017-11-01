/*
 *	LOAD
 */
var editor = ace.edit("output");
editor.setTheme("ace/theme/chrome");
editor.getSession().setMode("ace/mode/yaml");
editor.setShowPrintMargin(false);
editor.setReadOnly(true);
editor.$blockScrolling = Infinity;
editor.setValue($("pre code").text());

/*
 *	EVENTS
 */
$(".toggle").click(function() {
	$("." + $(this).attr("data-toggle")).toggle();
});

$(document).on("keyup", "input", function() {
	if($(this).attr("id").substr(-6) == "_keyup") {
		$("#" + $(this).attr("id").substr(0, $(this).attr("id").length - 6)).text($(this).val());
	}
});
$(document).on("keyup", "textarea", function() {
	if($(this).attr("id").substr(-6) == "_keyup") {
		var id = $(this).attr("id").substr(0, $(this).attr("id").length - 6);
		$("#" + id).empty();
		$.each($(this).val().split("\n"), function(index, value) {
			$("#" + id).append("\n        - '" + value + "'");
		});
		if($(this).is("textarea") && $(this).val().length == 0) {
			$("#" + $(this).attr("id").substr(0, $(this).attr("id").length - 6)).text("[]");
		}
	}
});
$(document).on("click", ".newItem", function() {
	$.get("templates/menu.txt", function(data) {
		$(".items-edit").append(data.replace(/replace/gi, parseInt($(".items-edit").find(">:last-child").attr("id")) + 1));
	});
	
	$.get("templates/item.txt", function(data) {
		$(".items").append(data.replace(/replace/gi, parseInt($(".items").find(">:last-child").attr("id")) + 1));
	});
});
$(document).on("click", ".removeItem", function() {
	if(confirm("Are you sure you want to remove this item?")) {
		$("#" + $(this).parent().closest("div").parent().closest("div").attr("id")).remove();
		$(this).parent().closest("div").parent().closest("div").remove();
	}
});
$(document).on("DOMSubtreeModified", "pre code", function() {
	editor.setValue($(this).text());
});