$(document).ready(function(){
   
   
    $(".box-options").hide().eq(0).show();
   
    $(".tab-options ul li a").click(function(){
      
        $(".box-options").hide();
        
        $($(this).attr("href")).show();
        
        return false;
      
    });
    
    $("ul li").click(function(){ });
                                                                                        
    $("#btnAddnetWork").click(function(){
        var nova = $("#netWork").clone();
        $(".netWorkContent").append(nova.show());
    });
                                                                                
    /*$("input").keyup(function () {
        var value = $(this).val();
        $("p").text(value);
    }).keyup();*/
    
    $('ul.tabs').each(function(){
        var $active, $content, $links = $(this).find('a');
        $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
        $active.addClass('active');
        $content = $($active.attr('href'));
        $links.not($active).each(function () {
            $($(this).attr('href')).hide();
        });
        $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();

            $active = $(this);
            $content = $($(this).attr('href'));

            $active.addClass('active');
            $content.show();
            e.preventDefault();
        });
    });

    
   
});