$(document).ready(function () {
  // AOS.init();

  // var oldColors = ['#4a3309','#7b591a','#b98e33','#b58727','#d19515'];
  // var newColors = [
  //   $('input[name="COLOR1"]').val(),
  //   $('input[name="COLOR2"]').val(),
  //   $('input[name="COLOR3"]').val(),
  //   $('input[name="COLOR4"]').val(),
  //   $('input[name="COLOR5"]').val(),
  // ];

  // function rgba2hex(orig) {
  //   var a, isPercent,
  //     rgb = orig.replace(/\s/g, '').match(/^rgba?\((\d+),(\d+),(\d+),?([^,\s)]+)?/i),
  //     alpha = (rgb && rgb[4] || "").trim(),
  //     hex = rgb ?
  //     (rgb[1] | 1 << 8).toString(16).slice(1) +
  //     (rgb[2] | 1 << 8).toString(16).slice(1) +
  //     (rgb[3] | 1 << 8).toString(16).slice(1) : orig;

  //   if (alpha !== "") {
  //     a = alpha;
  //   } else {
  //     a = 01;
  //   }
  //   // multiply before convert to HEX
  //   a = ((a * 255) | 1 << 8).toString(16).slice(1)
  //   hex = hex ;

  //   return '#' + hex;
  // }


  // $('body *').each(function(index, el) {
  //   var elemBackground = rgba2hex($(el).css('backgroundColor'));
  //   var elemColor = rgba2hex($(el).css('color'));
  //   var elemBack = rgba2hex($(el).css('background'));
  //   var elemBorderColor = rgba2hex($(el).css('borderColor'));
   
  //   if(oldColors.indexOf(elemBackground) > -1 ){
  //     var found = oldColors.indexOf(elemBackground);
  //     $(el).css('backgroundColor',newColors[found]);
  //   }

  //   if(oldColors.indexOf(elemColor) > -1 ){
  //     var found = oldColors.indexOf(elemColor);
  //     $(el).css('color',newColors[found]);
  //   }  

  //   if(oldColors.indexOf(elemBack) > -1 ){
  //     var found = oldColors.indexOf(elemBack);
  //     $(el).css('background',newColors[found]);
  //   }  

  //   if(oldColors.indexOf(elemBorderColor) > -1 ){
  //     var found = oldColors.indexOf(elemBorderColor);
  //     $(el).css('borderColor',newColors[found]);
  //   }  
  // });

  $(window).scroll(() => {
    if ($(this).scrollTop() > 20) {
      $(".myNavbar").addClass("fixed-navbar");
      $("#floating").css("opacity", "0.8");
    } else {
      $(".myNavbar").removeClass("fixed-navbar");
      $("#floating").css("opacity", "0");
    }
  });

  $('.select2').select2();

  $("#floating").click(() => {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      50
    );
  });

  if ($(".bg-sidenavOpen").length) {
    $(".bg-sidenavOpen").on("click", function () {
      $("#mySidenav").css("right", "-400px");
      $(this).css("display", "none");
      document.body.classList.remove("openMenuActive");
    });
  }

  var currentDir = $("a").css("direction");
  console.log(currentDir);

  if ($(".header-slider").length) {
    $(".header-slider").slick({
      arrows: true,
      dots: true,
      rtl: currentDir == "rtl" ? true : false,
    });
  }

  if($('.coFounders-slider').length){
    $(".coFounders-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      rtl: currentDir == "rtl" ? true : false,
      slidesToScroll: 1,
      autoplay: true,
      arrows: true,
      loop: true,
      infinite: true,
      responsive: [
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 524,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  if($('.event-slider').length){
    $(".event-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 2,
      rtl: currentDir == "rtl" ? true : false,
      slidesToScroll: 2,
      autoplay: true,
      arrows: true,
      loop: true,
      infinite: true,
      responsive: [
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 524,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }


  if ($(".clients-slider").length) {
    $(".clients-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      rtl: currentDir == "rtl" ? true : false,
      slidesToScroll: 1,
      autoplay: true,
      arrows: true,
      loop: true,
      infinite: true,
      responsive: [
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2 ,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 524,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }

  if ($(".mycustom-select").length) {
    $(".mycustom-select .title").click(function () {
      $(this).siblings().slideToggle();
      $(".selectList").not($(this).siblings()).slideUp();
    });
  }

	  
	$('body,html').on('click', function(e) {
		var container = $(".mycustom-select .title,.mycustom-select .title *"),
		Sub = $(".selectList");
		
	    if( !$(e.target).is(container)  ){
	        Sub.slideUp();
	    }
	
	});
	

  $(".selectList li").each((index, item) => {
    // console.log($(item))
    $(item).change(function () {
      let cityName = $(item).attr("value");
      $(this).closest(".mycustom-select-parent").find(".title").text(cityName);
      $(this)
        .closest(".mycustom-select-parent")
        .find(".cityInput")
        .val(cityName);
      $(this)
        .closest(".mycustom-select-parent")
        .find(".cityInput")
        .attr("value", cityName);
      console.log($(".cityInput").attr("value"));
    });
  });


  $(".sidenav li.NesteListParent").click(function () {
    $(this).children("ul").slideToggle();
    $(this).children("i").toggleClass("iMenue");
  });


  if($('.upload-file').length){
    $('body').on('change', '.custom-file-input ', function(e){
      var fileName = e.target.files[0].name;
      $(this).siblings('.custom-file-label').text(fileName);
      $(this).closest('.upload-file').siblings(".delelteFile").fadeIn(500).css('display', 'inline-block');
    })
  }

  if($('.delete-pic').length){
    let fileLabel = $('.delete-pic').closest('.upload-file').find('.custom-file-label').text();
    $('.delete-pic').click(function(){
      // $(this).fadeOut(500);
      $(this).closest('.upload-file').find('.custom-file-input').val("");
      $(this).closest('.upload-file').find('.custom-file-label').text(fileLabel);
      $(this).closest('.upload-file').find('.pic').css("background-image", "unset");
      $(this).closest('.upload-file').find('.pic').css("background-color", "#f1f1f1");
    })
  }

  if($('.delete-bank').length){
    let fileLabel = $('.delete-bank').closest('.upload-file').find('.custom-file-label').text();
    $('.delete-bank').click(function(){
      // $(this).fadeOut(500);
      $(this).closest('.upload-file').find('.custom-file-input').val("");
      $(this).closest('.upload-file').find('.custom-file-label').text(fileLabel);
      $(this).closest('.upload-file').find('.pic').css("background-image", "unset");
      $(this).closest('.upload-file').find('.pic').css("background-color", "#f1f1f1");
    })
  }


  if($('.delete-btn').length){
    let fileLabel = $('.delete-btn').closest('.upload-file').find('.custom-file-label').text();
    $('.delete-btn').click(function(){
      // $(this).fadeOut(500);
      $(this).closest('.upload-file').find('.custom-file-input').val("");
      $(this).closest('.upload-file').find('.custom-file-label').text(fileLabel);
    })
  }

  if ($(".upload-file").length) {
    $(document).on("change", ".personal-img-file", function () {
      var uploadFile = $(this);
      var files = !!this.files ? this.files : [];
      if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

      if (/^image/.test(files[0].type)) {
        // only image file
        var reader = new FileReader(); // instance of the FileReader
        reader.readAsDataURL(files[0]); // read the local file

        reader.onloadend = function () {
          // set image data as background of div
          //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
          uploadFile
            .closest(".personal-img")
            .find(".pic")
            .css("background-image", "url(" + this.result + ")");
          $(".personal-img-validation-delete").css("display", "block");
        };
      }
    });
  }

  if($("#datepicker").length){
    $( "#datepicker" ).datepicker();  
  }

  if($('#rigistermodalbtn').length){
    $('#rigistermodalbtn').click(function(e){
      e.preventDefault();
    })
  }

});

function openNav() {
  document.getElementById("mySidenav").style.right = "0";
  document.querySelector(".bg-sidenavOpen").style.display = "block";
  document.body.classList.add("openMenuActive");
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.right = "-400px";
  document.querySelector(".bg-sidenavOpen").style.display = "none";
  document.body.classList.remove("openMenuActive");
}

const splash = document.querySelector(".splash");

document.addEventListener("DOMContentLoaded", (e) => {
  setTimeout(() => {
    splash.classList.add("displayNone");
  });
});


$(function() {
          
      $(".addSocial .add .name,.addSocial .add i").click(function() {
        var id = $(this).parents(".add").attr("id");
        $(".inputSocial").not($("#"+id+" .inputSocial")).slideUp()
        $("#"+id+" .inputSocial").slideToggle();
      });
      
      $('body,html').on('click', function (e) {
        var container = $(".addSocial *"),
          Sub = $(".inputSocial");
    
    
        if (!$(e.target).is(container)) {
          Sub.slideUp();
        }
    
      });
        
      })
      
  
    $(".inputSocial .btnSoc").click(function() {
      var id = $(this).parents(".add").attr("id");
      
      if($("#"+id+" input").val() === '') {
        $("#"+id+" .name").text("");
      } else {
        $("#"+id+" .name").text($("#"+id+" input").val());
      }
      $(".inputSocial").slideUp();
    });
    
    $(".inputSocial input").change(function() {
      var id = $(this).parents(".add").attr("id");
      if($(this).val() === '') {
        $("#"+id+" .name").text("");
      }
    });