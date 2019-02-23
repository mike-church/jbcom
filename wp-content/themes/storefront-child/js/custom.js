jQuery(document).ready(function($){

$.fn.matchHeight._maintainScroll = true;
$('.match-height').matchHeight({byRow:0});

$( document ).ajaxComplete(function() {
// remove the old group
$('.match-height').matchHeight({ remove: true });
// apply matchHeight on the new selection, which includes the new element
$('.match-height').matchHeight({byRow:0});
}); 

});
