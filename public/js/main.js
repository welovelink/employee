(function($) {

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('#desktop-menu').hide();
        $('#mobile-menu').show();
        $('#img-banner').show();
        console.log('mobile')
    }else{
        $('#desktop-menu').show();
        $('#mobile-menu').hide();
        $('#img-banner').hide();
        console.log('desktop')
    }

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:true,
	    dots: true,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-ios-arrow-back'></span>","<span class='ion-ios-arrow-forward'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});

	};
	carousel();

})(jQuery);

const app = {};
app.showSpinner = function(){
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
};

app.hideSpinner = function(){
    $("div.spanner").removeClass("show");
    $("div.overlay").removeClass("show");
};

app.url = function(path){
    return $('base').prop('href') + path;
};

app.InitMessageValidate = function(){
    jQuery.extend(jQuery.validator.messages, {
        required: "กรุณากรอกข้อมูล",
        remote: "Please fix this field.",
        email: "Please enter a valid email address.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again.",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Please enter at least {0} characters."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });
};

app.AddMethodCitizenFormat = function(){
    jQuery.validator.addMethod("citizenFormat", function (id, element) {
        let sum = 0;
        for (let i = 0; i < 12; i++) {
            sum += parseFloat(id.charAt(i)) * (13 - i);
        }

        if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12))) {
            return false;
        } else {
            return true;
        }

    });
};

app.AddMethodStrongPass = function(){
    jQuery.validator.addMethod("strongpass", function (value, element) {
        let result = false;
        if (/[A-Z].*\d|\d.*[A-Z]/.test(value)) {
            result = true;
        }
        return result;
    });
}

app.initCitizen = function(){
    $('input[name="personal_id"]').keyup(function (e) {
        if (/\D/g.test(this.value)) {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
}

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

$(document).ajaxError(function(event, error) {
    /*Toast.fire({
        icon: 'error',
        title: error.statusText
    })*/

    let text = error.statusText;
    if(error.status === 599){
        text = error.responseJSON.message;
    }

    if(error.responseJSON.message !== undefined){
        Swal.fire({
            icon: 'error',
            title: 'เกิดข้อผิดพลาด',
            text: text,
            confirmButtonText: 'ปิด'
        }).then((result) => {
            if(result.isConfirmed){
                app.hideSpinner();
            }
        })
    }


});
