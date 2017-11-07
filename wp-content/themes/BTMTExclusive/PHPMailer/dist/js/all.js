/**
 * Copyright (c) 2007-2016 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 1.4.0
 */
;(function(a){if(typeof define==='function'&&define.amd){define(['jquery'],a)}else{a(jQuery)}}(function($){var g=location.href.replace(/#.*/,'');var h=$.localScroll=function(a){$('body').localScroll(a)};h.defaults={duration:1000,axis:'y',event:'click',stop:true,target:window};$.fn.localScroll=function(a){a=$.extend({},h.defaults,a);if(a.hash&&location.hash){if(a.target)window.scrollTo(0,0);scroll(0,location,a)}return a.lazy?this.on(a.event,'a,area',function(e){if(filter.call(this)){scroll(e,this,a)}}):this.find('a,area').filter(filter).bind(a.event,function(e){scroll(e,this,a)}).end().end();function filter(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')===g&&(!a.filter||$(this).is(a.filter))}};h.hash=function(){};function scroll(e,a,b){var c=a.hash.slice(1),elem=document.getElementById(c)||document.getElementsByName(c)[0];if(!elem)return;if(e)e.preventDefault();var d=$(b.target);if(b.lock&&d.is(':animated')||b.onBefore&&b.onBefore(e,elem,d)===false)return;if(b.stop){d.stop(true)}if(b.hash){var f=elem.id===c?'id':'name',$a=$('<a> </a>').attr(f,c).css({position:'absolute',top:$(window).scrollTop(),left:$(window).scrollLeft()});elem[f]='';$('body').prepend($a);location.hash=a.hash;$a.remove();elem[f]=c}d.scrollTo(elem,b).trigger('notify.serialScroll',[elem])}return h}));
/**
 * Copyright (c) 2007-2015 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 2.1.0
 */
;(function(l){'use strict';l(['jquery'],function($){var k=$.scrollTo=function(a,b,c){return $(window).scrollTo(a,b,c)};k.defaults={axis:'xy',duration:0,limit:true};function isWin(a){return!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!==-1}$.fn.scrollTo=function(f,g,h){if(typeof g==='object'){h=g;g=0}if(typeof h==='function'){h={onAfter:h}}if(f==='max'){f=9e9}h=$.extend({},k.defaults,h);g=g||h.duration;var j=h.queue&&h.axis.length>1;if(j){g/=2}h.offset=both(h.offset);h.over=both(h.over);return this.each(function(){if(f===null)return;var d=isWin(this),elem=d?this.contentWindow||window:this,$elem=$(elem),targ=f,attr={},toff;switch(typeof targ){case'number':case'string':if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=d?$(targ):$(targ,elem);if(!targ.length)return;case'object':if(targ.is||targ.style){toff=(targ=$(targ)).offset()}}var e=$.isFunction(h.offset)&&h.offset(elem,targ)||h.offset;$.each(h.axis.split(''),function(i,a){var b=a==='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,prev=$elem[key](),max=k.max(elem,a);if(toff){attr[key]=toff[pos]+(d?0:prev-$elem.offset()[pos]);if(h.margin){attr[key]-=parseInt(targ.css('margin'+b),10)||0;attr[key]-=parseInt(targ.css('border'+b+'Width'),10)||0}attr[key]+=e[pos]||0;if(h.over[pos]){attr[key]+=targ[a==='x'?'width':'height']()*h.over[pos]}}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)==='%'?parseFloat(c)/100*max:c}if(h.limit&&/^\d+$/.test(attr[key])){attr[key]=attr[key]<=0?0:Math.min(attr[key],max)}if(!i&&h.axis.length>1){if(prev===attr[key]){attr={}}else if(j){animate(h.onAfterFirst);attr={}}}});animate(h.onAfter);function animate(a){var b=$.extend({},h,{queue:true,duration:g,complete:a&&function(){a.call(elem,targ,h)}});$elem.animate(attr,b)}})};k.max=function(a,b){var c=b==='x'?'Width':'Height',scroll='scroll'+c;if(!isWin(a))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,doc=a.ownerDocument||a.document,html=doc.documentElement,body=doc.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(t){return $(t.elem)[t.prop]()},set:function(t){var a=this.get(t);if(t.options.interrupt&&t._last&&t._last!==a){return $(t.elem).stop()}var b=Math.round(t.now);if(a!==b){$(t.elem)[t.prop](b);t._last=this.get(t)}}};return k})}(typeof define==='function'&&define.amd?define:function(a,b){'use strict';if(typeof module!=='undefined'&&module.exports){module.exports=b(require('jquery'))}else{b(jQuery)}}));

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