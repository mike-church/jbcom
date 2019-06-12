<footer class="mdc-bg-grey-900 py-5">

	<div class="container my-5">
		<div class="row">
			<div class="col-sm-2">
				<img src="/wp-content/themes/fresh-start/dist/images/100.svg" class="img-fluid">
			</div>
			<div class="col-sm-4">
				
			</div>
			<div class="col-sm-4">
				
			</div>
			
		</div>
	</div>

</footer>

<?php wp_footer(); ?>

<script>$(".lockscroll").click(function(){$("body").toggleClass("no-scroll")})</script>
<script>AOS.init();</script>
<script type="text/javascript">
//Overlay
function openNav() {
  document.getElementById("siteNav").setAttribute( "style", "height: 100%; opacity: 1;");
}
function closeNav() {
  document.getElementById("siteNav").setAttribute( "style", "height: 0%; opacity: 0;");
}

function openSearch() {
  document.getElementById("siteSearch").setAttribute( "style", "left:0");
  $( ".overlay-container" ).css( "opacity", "1");
}

function closeSearch() {
  document.getElementById("siteSearch").setAttribute( "style", "left:-9999px");
  $( ".overlay-container" ).css( "opacity", "0");
}
</script>

</body>
</html>
