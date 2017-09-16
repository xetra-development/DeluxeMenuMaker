
/*
 *	EVENTS
 */
$("#showMenu").click(function() {
	$(".titles").toggle();
});
$("#showItems").click(function() {
	$(".items").toggle();
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
			$("#" + id).append("<br>		- '" + value + "'");
		});
		if($(this).is("textarea") && $(this).val().length == 0) {
			$("#" + $(this).attr("id").substr(0, $(this).attr("id").length - 6)).text("[]");
		}
	}
});

/*
 *	?
 *
$("select").change(function() {
	if($(this).attr("id").substr(-7) == "_change") {
		$("#" + $(this).attr("id").substr(0, $(this).attr("id").length - 7)).text($(this).val());
	}
});
*/

$(document).on("click", ".newItem", function() {
	$.get("templates/menu.txt", function(data) {
		$(".items-edit").append(data.replace(/replace/gi, parseInt($(".items-edit").find(">:last-child").attr("id")) + 1));
	});
	
	$.get("templates/item.txt", function(data) {
		$(".items").append(data.replace(/replace/gi, parseInt($(".items").find(">:last-child").attr("id")) + 1));
	});
});

/*
 *	FUNCTIONS
 */
 
/*
 *	?
 *
function makeYAMLList(array, indentAmt) {
	if (array.length == 0)
		return "[]";
	if (typeof array === "string") {
		array = array.split('\n');
	}
	var out = '\n';
	$.each(array, x => {
		value = array[x];
		out += Array(indentAmt + 1).join(' ') + "- '" + value + "'\n"
	});
	return out.substring(0, out.length - 1);
}

$(document).ready(
	function() {
		$('select[name=menu_type_select]').change(
			function() {
				var newText = $('option:selected', this).text();
				$('#box4').text(newText);
			}
		);
	}
);
*/