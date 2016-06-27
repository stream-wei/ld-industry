$(function(){
   
   $(".smartmenu ul li").hover(function() {
   	   $(".lis",this).stop().show();
   }, function() {
   	   $(".lis",this).stop().fadeOut();
   });

   
   $(".proList ul li").hover(function() {
      $(this).children("div").stop().animate({"bottom":"0px"},500);
   }, function() {
      $(this).children("div").stop().animate({"bottom":"-129px"},500);
   });

   $('.sidemenu>ul>li').click(function(){
        
        if( $(".erj",this).is(':hidden') ) {
          $('.sidemenu>ul>li').removeClass('active').find(".erj").slideUp();
          $(this).toggleClass('active').find(".erj").slideDown();
        }
    });

    $('.sidemenu .erj li').click(function(){
    	if( $("dl",this).is(':hidden') ) {
          $('.sidemenu .erj li').removeClass('active').find("dl").slideUp();
          $(this).toggleClass('active').find("dl").slideDown();
        }
    });

    $('.tabs > li').click(function(){   
       $('.tabs > li').removeClass('active');
       $(this).addClass('active');
       $('.tabscon dl').hide();
       $('.tabscon dl:eq(' + $('.tabs > li').index(this) + ')').show();
    });
   

    $(".header-lang").hover(function(){
      $(this).find("ul").show();
    },function(){
      $(this).find("ul").hide();
    });

    $(".search").hover(function(){
      $(this).find("ul").show();
    },function(){
      $(this).find("ul").hide();
    });
    

   $("#menuBtn").click(function(){
      $(".nav-narrow").animate({height: 'toggle', opacity: 'toggle'}, "slow");},
   function(){
      $(".nav-narrow").animate({height: 'toggle', opacity: 'toggle'}, "slow");
    });

   $("#setBtn").click(function(){
       $(".topRight").animate({height: 'toggle', opacity: 'toggle'}, "slow");},
   function(){
       $(".topRight").animate({height: 'toggle', opacity: 'toggle'}, "slow");
   });


   $('.rw-footer-box .rfb-h3 span').click(function(){

      if($('.rfb-cont').hasClass('hide')){
        $('.rfb-cont').removeClass('hide');
        $('.rfb-cont').css('display','block');
      }else{
        $('.rfb-cont').css('display','none');
        $('.rfb-cont').addClass('hide');
      }
      
    });


   /*小火箭*/
  $(window).scroll(function(e) {
    var numTop = $(window).height();
        if($(window).scrollTop()> numTop){
           $('.return').show();
        }else{
        $('.return').hide();
        }
  });

  //单击小火箭回到顶部
  $('.return').click(function(){
    $('html,body').animate({'scrollTop':'0px'}, 500);
  });


})
	
 
    

