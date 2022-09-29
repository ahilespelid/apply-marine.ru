$(document).ready(function(e){

  /*------------------------------ Fancybox --------------------------*/
  $("[rel=gallery]").fancybox({
    openEffect  : 'fade',
    closeEffect : 'fade',
    nextEffect  : 'fade',
    prevEffect  : 'fade',
    caption : {
      type : 'inside'
    },
    helpers : {
      thumbs : true
    }
  });

  /* --- js-menu --- */
  $("body").on("click",".toggle-menu, .background-open-menu, .open-menu",function(){
	   $("#main-menu").toggleClass("open");
     console.log("open");
  });
  $("body").on("click",".main-menu__close",function(){
    console.log("Закрыть");
	   $("#main-menu").removeClass("open");
  });

  /* --- second-menu --- */
  $("body").on("click",".open-submenu",function(){
    console.log("Открыть");
    $(this).parent().toggleClass("open");
  });
  $("body").on("click",".second-menu-open, .toggle-btn",function(){
    $(this).closest(".left-column").find(".second-menu").toggleClass("open");
  });


  $("body").on("click",".content-toggle",function(){
    let dataId = $(this).attr("data-id");
    $(".content-block").removeClass("open");
    $(".content-toggle").removeClass("active");
    $(this).toggleClass("active");
    $("#" + dataId).toggleClass("open");
  });

  /* --- Search --- */
  $(".search-link-element").click(function(){
	$(".search-block").toggleClass("active").delay(300).queue(function(){
		$(".search-block").toggleClass("visible-search");
		$(this).dequeue();
	});
  });

  /* скрипт для самодельного выпадающего списка */
  $("body").on("focus",".my-list-input",function(){
    var id = $(this).attr("id");
    var check = $(this).attr("data-checked");
    var checkList = $("ul[data-for=" + id + "]");
    $(checkList).children("li").removeClass("checked");
    $(checkList).children("li[data-id=" + check + "]").addClass("checked");
    $(checkList).removeClass("hidden-list");
  });
  $("body").on("focusout",".my-list-input",function(){
    var id = $(this).attr("id");
    setTimeout(function (){
      $("ul[data-for=" + id + "]").addClass("hidden-list");
    }, 100);
  });
  $("body").on("click",".input-list > li",function(){
    var id = $(this).attr("data-id");
    var name = $(this).text();
    var parentId = $(this).parent().attr("data-for");
    $("#" + parentId + " + .input-list > li").removeClass("checked");
    $("#" + parentId + " + .input-list > li[data-id=" + id + "]").addClass("checked");
    $("#" + parentId).attr("value",name).val(name).attr("data-checked",id);
  });

  /* ---- table - adaptation ----- */
  $("table").wrap("<div class='table-responsive'></div>");

  $('.main-slider').slick({
    dots: false,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    autoplay: true,
    autoplaySpeed: 5000,
    prevArrow: '<div class="slick-prev"><i class="fas fa-chevron-left"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fas fa-chevron-right"></i></div>',
  });

  $('.slider-photo').slick({
		dots: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
		autoplaySpeed: 5000,
    prevArrow: '<div class="slick-prev"><i class="fas fa-chevron-left"></i></div>',
    nextArrow: '<div class="slick-next"><i class="fas fa-chevron-right"></i></div>',
	});

  /* Скрипт отвечающий за кнопку прокрутки к началу страницы */
  var btn = $('#button');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });

  $("body").on("click",".mobile-menu-open",function(){
    $("#main-menu").toggleClass("active");
  });
  $("body").on("click",".close-menu",function(){
    $("#main-menu").removeClass("active");
  });

  $("form").on("focusout","input[type=date]",function(){
    var element = $("input[type=date] + label");
    console.log($(this).val());
    if($(this).val()) {
      element.addClass("d-none");
    } else {
      element.removeClass("d-none");
    }
  });

});

/* Плавная прокрутка к якорю */
$(document).ready(function() {
  $("a.scrollto").click(function() {
    var elementClick = $(this).attr("href")
    var destination = $(elementClick).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({
      scrollTop: destination
    }, 800);
    return false;
  });
});