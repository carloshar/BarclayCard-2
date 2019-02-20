$(document).ready(() => {
  if (window.innerWidth >= 768) {
    $(".section__site-nav").removeClass("section--hidden");
  }
  $("#buttonSearch").on("click", e => {
    e.preventDefault();
    $(".section__search-form").toggleClass("section--hidden");
  });

  $("#buttonNavToggle").on("click", e => {
    e.preventDefault();
    $(".section__site-nav").toggleClass("section--hidden");
  });
});
