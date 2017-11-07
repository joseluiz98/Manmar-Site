// HTML Bookmarks smooth scroll, clicked on any bookmarked anchor,
// do animated scroll to it's target element.
// jQuery Required
// Update 31st May to scroll for extrnal pages.

(function($){
    var h = window.location.hash;
    if( h.length > 1 ) {
        var target = $(h);
        if( target.length ) {
            $('html,body').animate({ scrollTop: target.offset().top },400);
        }
    }
    $(document).on('click','a',function(e){
        var a = $(this), href = a.attr('href');
        if(href && ~href.indexOf('#')){
            var name = 
            href.substr( href.indexOf('#') + 1 ), 
            target = $('a[name='+ name +']'), 
            target2 = $('#' + name);
            console.log(name);
            target = (target.length)? target : target2;
            if(target.length){
                e.preventDefault();
                $('html,body').animate({
                  scrollTop: target.offset().top - 100 //Input header size here
                },750); //Time in milliseconds
            }
        }
    });
})(jQuery);