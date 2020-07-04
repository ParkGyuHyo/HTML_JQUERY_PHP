$(function(){
   $("#pop_open").click(function(){
        $("#search_pop").fadeIn(600);
        $("#search_pop input[type=text]").focus();
    });

   $("#content ul li").click(function(){
       $("#content ul li").removeClass("on");
       $(this).addClass("on");
   });

   $("#search_pop #bottom_btn input[type=button]").click(function(){
       $("#search_pop").fadeOut(300);
   });
});