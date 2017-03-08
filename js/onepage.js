/* ====== Add Smooth effect ===== */
$(function() {
  var scrollToAnchor = function( id ) {
    var elem = $("section[id='"+ id +"']"); // on cr�e une balise d'ancrage
    if ( typeof elem.offset()  === "undefined" ) { // on verifie si l'�l�ment existe
		elem = $("#"+id); }
    if ( typeof elem.offset()  !== "undefined" ) { // si l'�l�ment existe, on continue
      $('html, body').animate({
              scrollTop: elem.offset().top }, 600 );} // on d�fini un temps de d�filement de page
  };
  $("a").click(function( event ) { // on attache la fonction au click
    if ( $(this).attr("href").match("#") ) { // on v�rifie qu'il s'agit d'une ancre
      event.preventDefault();
      var href = $(this).attr('href').replace('#', '') // on scroll vers la cible
      scrollToAnchor( href ); }
  });
});

/* ====== add class on pagination if the section is visible ====== */
  $(document).scroll(function() {
  var cutoff = $(window).scrollTop() + 200; // on d�fini la position de d�clenchement (*1)
  // Find current section and highlight nav menu
  var curSec = $.find('.current'); // on cherche l'�l�ment (section) avec la class current
  var curID = $(curSec).attr('id'); // on r�cup�re son ID
  var curNav = $.find('a[href=#'+curID+']'); // on cherche l'�l�ment de navigation correspondant (*2)
  $('li .op-v-link').removeClass('active'); // on nettoie la navigation de la class active pr�sente
  $(curNav).addClass('active'); // (*2) -> on ajoute la class active
  $('section').each(function(){
  if($(this).offset().top + $(this).height() > cutoff){ // si la section est dans le champ de scroll
  $('section').removeClass('current') // on nettoie les sections de la class current pr�sente
  $(this).addClass('current'); // on ajoute la class current � la section visible
  return false; // on stoppe l�it�ration (le cas contraire, seule la derniere section se verra ajouter la class)
  }
  });
  });