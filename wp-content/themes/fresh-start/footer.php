<footer class="mdc-bg-grey-900" style="height:300px;">I'm the footer</footer>

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
