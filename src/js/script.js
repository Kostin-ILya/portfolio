const hamburger = document.querySelector('.hamburger'),
      menu = document.querySelector('.menu'),
      closeElem = document.querySelector('.menu__close');

hamburger.addEventListener('click', () => {
  menu.classList.add('active');
});

closeElem.addEventListener('click', () => {
  menu.classList.remove('active');
});


const counters = document.querySelectorAll('.skills__ratings-counter'),
      lines = document.querySelectorAll('.skills__ratings-line');

counters.forEach( (item, i) => {
	lines[i].style.width = item.innerHTML
});

$(document).ready(function(){
  // $('[data-modal=appeal]').on('click', function(){
  //   $('.overlay, #thanks').fadeIn('slow');
  // });
  $('.modal__close').on('click', function() {
    $('.overlay, #thanks').fadeOut('slow')
  });
  
  function validateForms(form){
    $(form).validate({
      rules: {      
        name: {
          required: true,
          minlength: 2
        },        
        email: {
          required: true,
          email: true
        },
        terms: {
          required : true
       }
      },
      messages: {
        name: {     
          required: "Пожалуйста, введите свое имя",
          minlength: jQuery.validator.format("Введите {0} символа!")
        },
        email: {
          required: "Пожалуйста, введите свою почту",
          email: "Неправильно введен адрес почты"
        },
        terms: {
          required : "check the checbox"
      }
      }
    });
  };

  validateForms('#appeal-form');


$('form').submit(function(event){
  event.preventDefault();
  if (!$(this).valid()) {
    return;
  }
  $.ajax({
      type: "POST",
      url: "mailer/smart.php",
      data: $(this).serialize()
  }).done(function(){
      $(this).find("input").val("");
      $(this).find("textarea").val("");
      
      $('.overlay, #thanks').fadeIn('slow');
      $('form').trigger('reset');
  });
  return false;
});

new WOW().init();

  
});