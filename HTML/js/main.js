$('.datepicker').datepicker({
	autoclose: true,
	todayHighlight: true
});

var availableTags = [
	"Aceh",
	"Medan",
	"Padang",
	"Palembang",
	"Bengkulu",
	"Lampung",
	"Jakarta",
	"Bandung",
	"Yogyakarta",
	"Solo",
	"Semaarang",
	"Surabaya",
	"Madura",
	"Timor Timur",
	"Bali",
	"Lombok",
	"Pontianak",
	"Flores",
	"Balikpapan",
	"Makasar",
	"Maluku",
	"Jayapura"
];
$( ".autocomplete" ).autocomplete({
	source: availableTags
});

/* expand collapse module */
$('aside .tiles-white.titled .head').click(function(){
	$(this).parent().toggleClass('collapsed');	
});

//checkbox style
function checkInput($this_input){
	var name = $this_input.children('input').attr('name');
	if($this_input.children('input').prop('checked')){
		if($this_input.children('input').attr("type") == 'radio'){
			$('input[name='+name+']').parent().removeClass('checked')	
		}
		$this_input.addClass('checked');
	}else{
		$this_input.removeClass('checked')
	}	
}

$('.checkbox, .radio, .bookmark').click(function(){
	checkInput($(this));
});

//tooltip
$('[data-toggle="tooltip"]').tooltip();

//tab-panel
$('.tab-panel > ul li a').click(function(){
	$('.tab-panel > ul li a').removeClass('cur');	
	$(this).addClass('cur');
	var target = $(this).data('href');
	$('.overview > .panel').hide();
	$(target).show();

});

//quick promo
$('.quick-drop').click(function(){
	$('.promo .container').fadeToggle();	
	$(this).toggleClass('cur');
	$('.banner .search').toggle();
});


//mobile menu
$('.mini-header .menu').click(function(){
	$('#header').addClass('cur');	
});

$('.main-header > span').click(function(){
	$('#header').removeClass('cur');	
});

//login popup
$("#login_btn").colorbox({inline:true, href:"#login-block"});

$(document).ready(function () {
	enquire.register("screen and (max-width: 768px)", function() {
		$('.step-content aside .tiles-white .head').parent().addClass('collapsed');
	});
});