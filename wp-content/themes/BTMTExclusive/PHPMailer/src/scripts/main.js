
$(document).ready(function(){

    (function() {
        "use strict";

        var toggles = document.querySelectorAll(".c-hamburger");

        for (var i = toggles.length - 1; i >= 0; i--) {
            var toggle = toggles[i];
            toggleHandler(toggle);
        };

        function toggleHandler(toggle) {
                toggle.addEventListener( "click", function(e) {
                e.preventDefault();
                (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
            });
        }
    })();

	var $themeUrl = WPURLS.themeUrl;
	var $siteUrl = WPURLS.siteurl;
    var $ajaxUrl = WPURLS.ajaxUrl;

	var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
	};

	$('nav').localScroll({offset: -80});

    // Scroll para o topo da pagina
    $(function() { 
        $(window).scroll(function() { 
            if($(this).scrollTop() != 0) { 
                $('#toTop').fadeIn();   
            } else { 
                $('#toTop').fadeOut(); 
            } 
        }); 
        $('#toTop').click(function() { 
            $('body,html').animate({scrollTop:0},800); 
        });
    });

	// Envio do formulário de contato por ajax
	$('#sendContato').click( function(){
      
        /* Coletando dados */
        var nome  	   = $('#txtName').val();
        var email      = $('#txtEmail').val();
        var destinatario  = $('#subject :selected').val();
        var msg        = $('#txtMessage').val();

        var fc_name = new Spry.Widget.ValidationTextField("fc_name", "none", {validateOn:["blur", "change"]});
        var fc_email = new Spry.Widget.ValidationTextField("fc_email", "email", {validateOn:["blur", "change"]});
        var fc_destinatario = new Spry.Widget.ValidationSelect("fc_subject", {validateOn:["blur", "change"]});
        var fc_message = new Spry.Widget.ValidationTextarea("fc_message", {validateOn:["blur", "change"]});

        var valnome = fc_name.validate();
        var valemail = fc_email.validate();
        var valDestinatario = fc_destinatario.validate();
        var valmessage = fc_message.validate();

        /* Validando */
        if(valnome && valemail && valDestinatario && valmessage){
   
            /* construindo url */
            var urlData = "&nome=" + nome + "&email=" + email + "&destinatario=" + destinatario + "&msg=" + msg ;
     
            /* Ajax */
            $.ajax({
                type: "POST",
                url: $themeUrl+"/send-contact.php",        /* endereço do script PHP */
                async: true,
                data: urlData,                             /* informa Url */
                success: function(data) {                  /* sucesso */
                    $('#retornoHTML').html(data);
                },
                beforeSend: function() {                   /* antes de enviar */
                    $('.loading').fadeIn('fast');
                },
                complete: function(){                      /* completo */
                    $('.loading').fadeOut('fast');
                    $('#formContato')[0].reset();
                }
            });
        }
    });
    
    // Envio do formulário de cadastro de news por ajax
    $('#formContatoNews').click( function(){
      
        /* Coletando dados */
        var nome       = $('#txtName').val();
        var email      = $('#txtEmail').val();

        var fc_name = new Spry.Widget.ValidationTextField("fc_name", "none", {validateOn:["blur", "change"]});
        var fc_email = new Spry.Widget.ValidationTextField("fc_email", "email", {validateOn:["blur", "change"]});

        var valnome = fc_name.validate();
        var valemail = fc_email.validate();

        /* Validando */
        if(valnome && valemail){
   
            /* construindo url */
            var urlData = "&nome=" + nome + "&email=" + email;
     
            /* Ajax */
            $.ajax({
                type: "POST",
                url: $themeUrl+"/insert-news.php",        /* endereço do script PHP */
                async: true,
                data: urlData,                             /* informa Url */
                success: function(data) {                  /* sucesso */
                    $('#retornoHTMLnews').html(data);
                },
                beforeSend: function() {                   /* antes de enviar */
                    $('.loading').fadeIn('fast');
                },
                complete: function(){                      /* completo */
                    $('.loading').fadeOut('fast');
                    $('#formContatoNews')[0].reset();
                }
            });
        }
    });
    
    //exibir formulario para cadastro de numero de telefone
    $('.whatts').click( function(){
                        
        var idLink = $(this).attr('data-id-link');
        $('#contentForm'+idLink).slideToggle("fast", function() {});
    });

    // Envio do formulário de cadastro de news por ajax
    // $('.sendContatoDownload').click( function(){
        
    //     var idLink = $('.whatts').attr('data-id-link');

    //     var idForm = $('#formApoie').attr('data-id-form');

    //     if (idLink === idForm) {

    //         /* Coletando dados */
    //         var numero       = $('#txtNumberFile'+idLink).val();

    //         var nome       = $('#txtNameFile'+idLink).val();

    //         var url       = $('#txtUrlFile'+idLink).val();

    //         alert(numero);
    //         alert(nome);
    //         alert(url);
    //         event.preventDefault();
    //         // var fc_numero = new Spry.Widget.ValidationTextField("fc_name", "none", {validateOn:["blur", "change"]});
    //         // var valnumero = fc_numero.validate();

    //         /* Validando */
    //         if(numero){
       
    //             /* construindo url */
    //             var urlData = "&numero=" + numero + "&nome=" + nome + "&url=" + url;

         
    //             /* Ajax */
    //             $.ajax({
    //                 type: "POST",
    //                 url: $themeUrl+"/insert-number-whatsapp.php",        /* endereço do script PHP */
    //                 async: true,
    //                 data: urlData,                             /* informa Url */
    //                 success: function(data) {                  /* sucesso */
    //                     $('#retornoHTML').html(data);
    //                 },
    //                 beforeSend: function() {                   /* antes de enviar */
    //                     $('.loading').fadeIn('fast');
    //                 },
    //                 complete: function(){                      /* completo */
    //                     $('.loading').fadeOut('fast');
    //                     $('#formApoie')[0].reset();
    //                 }
    //             });
    //         }

    //     };
    // });

    //Inicio Mascara Telefone
    $.mask.definitions['~']='[+-]';
    $('.phone').mask("(99) 9999-9999?9").ready(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    });

    //Minimiza fonte
    $('#a_menos').click(function(){
        
        var normal = $('body').css('font-size');
        //alert(normal);
        var recipiente = 'body';
        var acao = $(this).attr('class');
        var atual = parseFloat($(recipiente).css('font-size'));
        
        if (acao == 'aumentar'){
            var novotamanho = atual*1.1;
                if (novotamanho < 36){
                    $(recipiente).css('font-size', novotamanho);
                }
        }

        if (acao == 'diminuir'){
            var novotamanho = atual*0.9;
                if (novotamanho > 8){
                    $(recipiente).css('font-size', novotamanho);    
                }
        }

        if (acao == 'padrao'){
            $(recipiente).css('font-size', normal)
        }

        return false;
    });

    //Maximiza fonte
    $('#a_mais').click(function(){
        
        var normal = $('body').css('font-size');
        var recipiente = 'body';
        var acao = $(this).attr('class');
        var atual = parseFloat($(recipiente).css('font-size'));
        
        if (acao == 'aumentar'){
            var novotamanho = atual*1.1;
                if (novotamanho < 36){
                    $(recipiente).css('font-size', novotamanho);
                }
        }

        if (acao == 'diminuir'){
            var novotamanho = atual*0.9;
                if (novotamanho > 8){
                    $(recipiente).css('font-size', novotamanho);    
                }
        }
      
        if (acao == 'padrao'){
            $(recipiente).css('font-size', normal)
        }
        
        return false;
    });

    //Filtra propostas por tipo (pagina propostas)
    $("#tipo-proposta").change(function() {

        var args = $(this).val();
        var data = {
            action: 'select_tipo_proposta',
            area : args
        }
        $(".rowResults").hide(); 
        $("#listData").hide();
        $("#load").show(); 

        $.post(ajaxurl, data, function(ListPost){
            $("#load").hide();
            $(".rowResults").show(); 
            $(".rowResults").html(ListPost);                             
                    
        });
    });

    //Filtra arquivos por tipo (pagina imprensa)
    $("#tipo-arquivo").change(function() {

        var args = $(this).val();
        var data = {
            action: 'select_tipo_arquivo',
            tipo : args
        }
        $(".rowResults").hide(); 
        $("#listData").hide();
        $("#load").show(); 

        $.post(ajaxurl, data, function(ListPost){
            $("#load").hide();
            $(".rowResults").show(); 
            $(".rowResults").html(ListPost);                            
        });
    });

    //Filtra arquivos por tipo (pagina apoie a campanha)
    $("#tipo-arquivo-download").change(function() {

        var args = $(this).val();
        var data = {
            action: 'select_tipo_arquivo_download',
            tipo : args
        }
        $(".rowResults").hide(); 
        $("#listData").hide();
        $("#load").show(); 
        $.post(ajaxurl, data, function(ListPost){
            $("#load").hide();
            $(".rowResults").show(); 
            $(".rowResults").html(ListPost);                              
        });
    });



    $("#contraste").click(function () {
        $(this).hide();
        $('#contrasteOne').show();   
    });

    $("#contrasteOne").click(function () {
        $(this).hide();
        $('#contraste').show();
    });


    //Aplica contraste
    function setActiveStyleSheet(title) {
      var i, a, main;
      for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
          a.disabled = true;
          if(a.getAttribute("title") == title) a.disabled = false;
        }
      }
    }

    function getActiveStyleSheet() {
      var i, a;
      for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
        if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled) return a.getAttribute("title");
      }
      return null;
    }

    function getPreferredStyleSheet() {
      var i, a;
      for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
        if(a.getAttribute("rel").indexOf("style") != -1
           && a.getAttribute("rel").indexOf("alt") == -1
           && a.getAttribute("title")
           ) return a.getAttribute("title");
      }
      return null;
    }

    function createCookie(name,value,days) {
      if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
      }
      else expires = "";
      document.cookie = name+"="+value+expires+"; path=/";
    }

    function readCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
      }
      return null;
    }

    window.onload = function(e) {
      var cookie = readCookie("style");
      var title = cookie ? cookie : getPreferredStyleSheet();
      setActiveStyleSheet(title);
    }

    window.onunload = function(e) {
      var title = getActiveStyleSheet();
      createCookie("style", title, 365);
    }

    var cookie = readCookie("style");
    var title = cookie ? cookie : getPreferredStyleSheet();
    setActiveStyleSheet(title);
});