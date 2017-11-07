$(document).ready(function(){
	
	var $themeUrl = WPURLS.themeUrl;
    var $siteUrl = WPURLS.siteurl;

	// Envio do formulário de contato por ajax
    $('#sendContato').click( function(){

        /* Coletando dados */
        var nome       = $('#txtNameContact').val();
        var email      = $('#txtEmailContact').val();
        var phone      = $('#txtPhoneContact').val();
        var subject    = $('#txtSubjectContact').val();
        var msg        = $('#txtMessageContact').val();
        var lang        = $('#txtLanguage').val();


        var fc_name_contact = new Spry.Widget.ValidationTextField("fc_name_contact", "none", {validateOn:["blur", "change"]});
        var fc_email_contact = new Spry.Widget.ValidationTextField("fc_email_contact", "email", {validateOn:["blur", "change"]});
        var fc_subject_contact = new Spry.Widget.ValidationTextField("fc_subject_contact","none", {validateOn:["blur", "change"]});
        var fc_phone_contact = new Spry.Widget.ValidationTextField("fc_phone_contact", "none", {validateOn:["blur", "change"]});
        var fc_message_contact = new Spry.Widget.ValidationTextarea("fc_message_contact", {validateOn:["blur", "change"]});
      

        var valnome = fc_name_contact.validate();
        var valemail = fc_email_contact.validate();
        var valsubject = fc_subject_contact.validate();
        var valphone = fc_phone_contact.validate();
        var valmessage = fc_message_contact.validate();

        /* Validando */
        if(valnome && valemail && valsubject && valphone && valmessage){
   
            /* construindo url */
            var urlData = "&nome=" + nome + "&email=" + email + "&subject=" + subject + "&phone=" + phone +"&msg=" + msg +"&lang="+lang;
     		
     		console.log(urlData);
            /* Ajax */
            $.ajax({
                type: "POST",
                url: $themeUrl+"/send-contact.php",        /* endereço do script PHP */
                async: true,
                data: urlData,                             /* informa Url */
                success: function(data) {                  /* sucesso */
                    $('#retornoHTMLcontact').html(data);
                },
                beforeSend: function() {                   /* antes de enviar */
                    $('.loading').fadeIn('fast');
                    $('#sendContato').prop("disabled", true);
                },
                complete: function(){                      /* completo */
                    $('.loading').fadeOut('fast');
                    $('#formContato')[0].reset();
                    timer = setTimeout(function () {
                        //$('#retornoHTMLcontact').addClass('hide');
                    }, 5000);
                    $('#sendContato').prop("disabled", false);
                }
            });
        }
    });

	$(".owl-carousel").owlCarousel({
        center: true,
        items:2,
        loop:true,
        margin:0,
        nav:true,
        navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>", "<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
        dots: false,
        navClass: ["owl-prev icon-prev", "owl-next icon-next"],
        responsive:{
            0:{
            	items:1,
            	dots: true,
        		nav:false,
            },
            600:{
                items:2,
                dots: true,
        		nav:false,
            },
            1000:{
                items:3
            }
        }
    });
    
    $window = $(window);
    $('section[data-type="background"]').each(function(){
        var $scroll = $(this);              
        $(window).scroll(function() {
            var yPos = -($window.scrollTop() / $scroll.data('speed')); 
            var coords = '50% '+ yPos + 'px';
            $scroll.css({ backgroundPosition: coords });    
        });
    });

	//Pega valor do cookie pelo chave
	function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	var cookieModal = getCookie("newsletters_cookie");
	if(!cookieModal) {
		//$('#newsletterModal').modal('show');
	}
	new UISearch(document.getElementById('sb-search'));
	// Auto Height PromoBlock Start
	var OffsetHeight = $(window).height();
	$('.PromoBlock').css({ 'height': OffsetHeight + 'px' });
	$(window).resize(function () {
		var OffsetHeight = $(window).height();
		$('.PromoBlock').css({ 'height': OffsetHeight + 'px' });
	});
	// #Auto Height PromoBlock End
	// jPushMenu Start
	jQuery(document).ready(function ($) {
		$('.toggle-menu').jPushMenu();
	});

	// #jPushMenu End
	// User Reviews Slider Start
	var swiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		paginationClickable: true,
		keyboardControl: true,
		autoplay: 4000
	});

	// #User Reviews Slider End
	// Header Size Change Upon Scroll Start
	$(document).on('scroll', function () {
		// if the scroll distance is greater than 100px
		if ($(window).scrollTop() > 100) {
			// do something
			$("header").addClass("Shrinked");
		}
		else {
			$("header").removeClass("Shrinked");
		}
	});

	// #Header Size Change Upon Scroll End
	// Setting Contents Size Start
	if ($(window).width() < 768) {
		if ($(window).width() > $(window).height()) {
			$("header").addClass("Shrinked");
			$("head").append("<link id='StylesheetMobile' rel='stylesheet' type='text/css' href='Assets/Css/StylesheetMobile.css'>");
		}
		else {
			$("#StylesheetMobile").removeAttr("href");
		};
		$(window).resize(function () {
		});

		document.getElementById('map').style.width ="100%";
		document.getElementById('direcao').style.width ="100%";
	};

	// #Setting Contents Size End
	$("footer .SubscribeButton").click(function () {
		var SubscriberEmail = $("footer #SubscriberEmail").val();
		$("#OptInModal #sml_subscribe .sml_emailinput").val(SubscriberEmail);
		$('#OptInModal').modal('show');
	});

	$("footer #menu-item-129 a, footer #menu-item-139 a, .PopUp a").attr('data-toggle', 'modal');

	$("#ContactFormx").submit(function (event) {
		//alert( "Handler for .submit() called." );
		$('#ContactThanks').modal('show');
		event.preventDefault();
	});

	$(function () {
		$('#ContactForm #Submit').on('click', function (e) {
			console.log('iniciando validação dos campos...');
			$.validator.messages.required = '';
			$('#ContactForm').validate({
				rules: {
					YourName: "required",
					YourEmail: "required",
					Subject: "required",
					PhoneNumber: "required",
					YourMessage: "required"
				},
				messages: {
					YourName: "required",
					YourEmail: "required",
					Subject: "required",
					PhoneNumber: "required",
					YourMessage: "required"
				}
			});
			console.log('validação dos campos finalizada...');
			if ($('#ContactForm').valid()) {
				console.log('campos validados...');
				$("#ContactForm #Submit").prop("disabled", true);
				$("#ContactForm #Submit").addClass('Activity');
				$(function () {
					var YourName = $("#ContactForm #YourName").val();
					var YourEmail = $("#ContactForm #YourEmail").val();
					var Subject = $("#ContactForm #Subject").val();
					var PhoneNumber = $("#ContactForm #PhoneNumber").val();
					var YourMessage = $("#ContactForm #YourMessage").val();
					$.ajax({
						type: "POST",
						//url: 'envio.php?name='+YourName+'&email='+YourEmail+'&sub='+Subject+'&phone='+PhoneNumber+'&msn='+YourMessage+'',
						url: 'envio.php',
						//dataType:'json',
						data: {
							'name': YourName,
							'email': YourEmail,
							'sub': Subject,
							'phone': PhoneNumber
						},
						//data:'{"YourName": "'+YourName+'","YourEmail": "'+YourEmail+'","Subject": "'+Subject+'","PhoneNumber": "'+PhoneNumber+'","YourMessage": "'+YourMessage+'"}',
						success: function(result) {
							console.log(result);
							$("#ContactForm #Submit").prop("disabled", false);
							$("#ContactForm #Submit").removeClass('Activity');
						},
						error: function(error1,error2) {
							console.log(error1);
							alert("Form could not be submitted!");
							$("#ContactForm #Submit").prop("disabled", false);
							$("#ContactForm #Submit").removeClass('Activity');
						},
						complete: function(transport) {
							if (transport.status == 200) {
								$('#ContactThanks').modal('show');
								$("#ThankYouName").html(YourName);
								//$("#lblmsgx").html("Success");
								$("#ContactForm #Submit").prop("disabled", false);
								$("#ContactForm #Submit").removeClass('Activity');
							}
							else {
								//alert("Could not be completed properly.");
								$("#ContactForm #Submit").prop("disabled", false);
								$("#ContactForm #Submit").removeClass('Activity');
							};
						}
					});
				});
			} else {
				//alert("Not Valid");
			};
		});
	});

	$("#locationButton").click(function(){
		$("#mapaUni").attr("style","margin-left: -30px;height: 300px;position: initial;");
	});

	var idInfoBoxAberto;
	var infoBox = [];
	var map;
	var markers = [];
	var refresh = true;

	$("#buttonSendEmail").click(function(){
		phone = "";
		email = "";
		name = "";
		subject = "";
		note = "";
		//fields in input
		$.each($("#ContactForm input"),function(i,item){
			if(is_Empty(item.value)){
				$(item).css({"border":"1px solid red"});
				item.value="";
			}else{
				$(item).css({"border":"1px solid green"});
				console.log($(item).val()+" (gree)");
				switch($(item).attr("name")){
					case 'YourEmail':
					email = $(item).val();
					if(email.indexOf("@")>=0 && email.count(".")>=2){    	
						status++;		
					}else{
						$(item).css({"border":"1px solid red"});
					}
					break;
					case 'YourName':
					name = $(item).val();
					status++;
					break;
					case 'PhoneNumber':
					phone = $(item).val();
					status++;
					break;
					case 'YourMessage':
					note = $(item).val();
					status++;
					break;
					case 'Subject':
					subject = $(item).val();
					status++;
					break;
				}
			}
		});
		console.log("campos certos: "+status);
		if(status==5){
			teste = '{"phone":"'+phone+'","name":"'+name+'","email":"'+email+'","subject":"'+subject+'","note":"'+note+'"}';
			console.log("request sending: "+teste);
			$("#form").hide();
			$("#load").show();
			$.ajax({
				type:'POST',
				dataType:'json',
				url: "sendEmail.php",
				data: teste,
				success: function(result){
					console.log("oioioioioi");
				},error: function (jqXHR, exception) {
					console.log(jqXHR);
				}
			});
		}
	});

	function is_Empty(texto){
		aux = texto.replace(/\s/g, "");
		if(aux==""){
			return true;
		}else{
			return false;
		}
	}

	$(function () {

		$('.es_shortcode_form #es_txt_button_pgx').on('click', function (e) {

			$.validator.messages.required = '';

			$('.es_shortcode_form').validate({

				rules: {

					es_txt_name_pg: "required",

					es_txt_email_pg: "required"

				},

				messages: {

					es_txt_name_pg: "*",

					es_txt_email_pg: "*"

				}

			});



			if ($('.es_shortcode_form').valid()) {

				alert("Successfully subscribed");

			} else {

				alert("Error: Could not subscribe, please recheck details.");

			};

		});
	});

	$('.ThePosts').easyPaginate({

		paginateElement: '.ThePost',

		elementsPerPage: 2,

		effect: 'slide'
	});

	$(".easyPaginateNav a").click(function () {

		$('html, body').animate({

			scrollTop: $("header").offset().top

		}, 500);
	});

	var SiteHomeAddress = "http://labs.themightyroar.com/BTMT/Dynamic"; //$(".HeaderLogo").attr('href');

	$("li.Language #English").click(function () {

		window.location(SiteHomeAddress);
	});

	$("li.Language #French").click(function () {

		window.location(SiteHomeAddress + '/fr/');
	});

	$("li.Language #Dutch").click(function () {

		window.location(SiteHomeAddress + '/nl/');
	});

	$('.loginlink').click(function () {
		if(click==0){
			$('div#frontpageanimateblock').animate({
				'marginLeft': '+=1501px'
			});
			click=1;
		}else{
			$('div#frontpageanimateblock').animate({
				'marginLeft': '-=1501px'
			});
			click=0;
		}
	});

	$('#loginlinkback').click(function () {
		if(click==0){
			$('div#frontpageanimateblock').animate({
				'marginLeft': '+=1501px'
			});
			click=1;
		}else{
			$('div#frontpageanimateblock').animate({
				'marginLeft': '-=1501px'
			});
			click=0;
		}
	});

	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    // $(".viewMap").click(function(){

    // 	var lat = $(this).attr('data-lat');
    // 	var long = $(this).attr('data-long');
    // 	var id = $(this).attr('data-id');
    // 	var title = $(this).attr('alt');
    // 	$("#modalTitle").empty();

    //     switch(id) {

    //         //antwerpen
    //         case '1234':
    //         	$("#modalTitle").wrapInner(title);
    //             $("#map_canvas").empty();
    //             $("#map_canvas").append("<iframe style='pointer-events: none;' src='https://www.google.com/maps/d/embed?mid=1Sm02yttkTmY1KUM9NgYJHmT_OC0' width='100%' height='400'></iframe>");
    //             break;

    //         //anspach
    //         case '1235':
    //         	$("#modalTitle").wrapInner(title);
    //             $("#map_canvas").empty();
    //             $("#map_canvas").append("<iframe style='pointer-events: none;' src='https://www.google.com/maps/d/embed?mid=1Seuh5xCGVP39pBINtkum20Q1RCA' width='100%' height='400'></iframe>")
    //             break;

    //         //barriere
    //         case '1236':
    //         	$("#modalTitle").wrapInner(title);
    //             $("#map_canvas").empty();
    //             $("#map_canvas").append("<iframe style='pointer-events: none;' src='https://www.google.com/maps/d/embed?mid=1ittaghe2bEuWShuevBfjuURLcck' width='100%' height='400'></iframe>");
    //             break;

    //         //midi
    //         case '1237':
    //         	$("#modalTitle").wrapInner(title);
    //             $("#map_canvas").empty();
    //             $("#map_canvas").append("<iframe style='pointer-events: none;' src='https://www.google.com/maps/d/embed?mid=1HNkGUFc4nQxrSe7PipoyLHAuTrw' width='100%' height='400'></iframe>");
    //             break;

    //         //parvis
    //         case '1238':
    //         	$("#modalTitle").wrapInner(title);
    //             $("#map_canvas").empty();
    //             $("#map_canvas").append("<iframe style='pointer-events: none;' src='https://www.google.com/maps/d/embed?mid=1a1yLwHtsUagTGGRBD757llLHp_w' width='100%' height='400'></iframe>");
    //             break;
            
    //         //bara
    //         case '1239':
    //         	$("#modalTitle").wrapInner(title);
    //             $("#map_canvas").empty();
    //             $("#map_canvas").append("<iframe style='pointer-events: none;' src='https://www.google.com/maps/d/embed?mid=1TMah3rYVBglaofIQXrh7MMos5Yg' width='100%' height='400'></iframe>");
    //             break;

    //         //flagey
    //         case '1240':
    //         	$("#modalTitle").wrapInner(title);
    //             $("#map_canvas").empty();
    //             $("#map_canvas").append("<iframe style='pointer-events: none;' src='https://www.google.com/maps/d/embed?mid=1IMxfk4lgtRPKdpev2rsX2BFyPKc' width='100%' height='400'></iframe>");
    //             break;
    //     }
    // });
    $("#faqBottonMenu").on("click", function() {
        var sOptionVal = $(this).val();
        if (/modal/i.test(sOptionVal)) {
            var $selectedOption = $(sOptionVal);
            $selectedOption.modal('show');
        }
    });
});

$(window).load(function() {
    $('.post-module').hover(function() {
        $(this).find('.description').stop().animate({
          height: "toggle",
          opacity: "toggle"
        }, 300);
    });
});