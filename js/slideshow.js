// JavaScript Document

(function( $ ){
    var methods = {
        init : function( options ) {        
            var settings = $.extend({
                buttonDivId:        'slideshow-buttons',
                cur:                0,
                delay:              5500,
                end:                $('img', this).length,
                fadeInInterval:     600,
                fadeOutInterval:    600,
                delayAfterClick:    0,
                start:              0,
                timer:              null
            }, options);

            return rval = this.each(function(){ 
                var paused = false;
                var $this = $(this), data = $this.data('state');                
                if (!data) $(this).data('state', settings);

                // Hide non visible elements
                //$('a, #slideshow-captions p', $this).not('.slideshow-caption a').hide();

                // Add the buttons
                $('#slideshow').before('<div id="slideshow-wrap"></div>');
                $('#slideshow').appendTo('#slideshow-wrap');
                $('#slideshow-wrap').append('<div id="slideshow-buttons"><ul></ul></div>');
                var numSlides = $('#slideshow img').length;
                var slideshowButtonsWidth = 35+(14*numSlides);
                $('#slideshow-buttons').width(slideshowButtonsWidth);
                $('#slideshow-buttons').prepend('<p class="pause"><a href="#" title="Pause">Pause Slideshow</a></p>');
                
                var z = 1;
                $('#slideshow img').each(function() {
                    $(this).parent().parent().attr("id","slide"+z);
                    $('#slideshow-buttons ul').append('<li><a href="#slide'+z+'" class="buttonOff" title="Show slide #'+z+'">Show slide #'+z+'</a></li>');
                    z = z+1;
                });

                // Add event handlers for buttons
                $('#slideshow-buttons li a').bind('click focus', function(event) {
                    event.preventDefault();
                    $(this).keydown(function(e){
                        if(e.which==13){
                            window.location = $(this).attr("href");
                        }
                    });
                    var i = $(event.target).parent().prevAll('li').length;
                    $this.data('state').cur = i;
                    paused = true;
                    $('#slideshow-buttons .pause').removeClass('pause').addClass('play').html('<a href="#" title="Play">Play Slideshow</a>');
                    methods.showbtn.apply($this);
                });
                

                $('#slideshow-buttons p a').live('click', function(event) {
                    event.preventDefault();
                    if($(this).parent().hasClass("pause")){
                        $(this).parent().removeClass('pause').addClass('play').html('<a href="#" title="Play">Play Slideshow</a>');
                        window.clearTimeout($this.data('state').timer);
                        paused = true;
                    }
                    if($(this).parent().hasClass("play")){
                        $(this).parent().removeClass('play').addClass('pause').html('<a href="#" title="Pause">Pause Slideshow</a>');
                        window.clearTimeout($this.data('state').timer);
                        $this.data('state').timer = window.setTimeout(function () {
                            methods.show.apply($this);
                        }, 0);
                        paused = false;
                    }
                });
                
                if(paused=true) {
                    $('#slideshow-buttons li a').bind('click focus', function(event) {
                        window.clearTimeout($this.data('state').timer);
                    });
                }
                else {}
                
                methods.show.apply($this);
            });
        },

        show : function () {
            var $this = $(this), state = $this.data('state');
            $($('img', $this).get(state.cur)).show().parent().fadeIn(state.fadeInInterval).parent().siblings().children().hide();
            
            // Set button state
            $('.buttonOn').removeClass('buttonOn');
            $($('#slideshow-buttons li a').get(state.cur)).addClass('buttonOn');

            // Show caption
            $('.slideshow-caption').hide();
            $($('.slideshow-caption').get(state.cur)).show();

            // Set timer to next state
            $this.data('state').timer = window.setTimeout(function () {
                methods.fadeOut.apply($this);
            }, state.delay - state.fadeOutInterval - state.fadeInInterval);
            return $this;
        },
        
        showbtn : function () {
            var $this = $(this), state = $this.data('state');
            $($('img', $this).get(state.cur)).show().parent().show().parent().siblings().children().hide();
            
            // Set button state
            $('.buttonOn').removeClass('buttonOn');
            $($('#slideshow-buttons li a').get(state.cur)).addClass('buttonOn');

            // Show caption
            $('.slideshow-caption').hide();
            $($('.slideshow-caption').get(state.cur)).show();
            
            // Set timer to next state
            /*$this.data('state').timer = window.setTimeout(function () {
                methods.fadeOut.apply($this);
            }, state.delay - state.fadeOutInterval - state.fadeInInterval);*/
            return $this;
        },
        
        fadeOut : function () {
            // Fade out
            var $this = $(this), state = $this.data('state');
            //$($('img', $this).get(state.cur)).fadeOut(state.fadeOutInterval);

            // Set timer to next state
            $this.data('state').timer = window.setTimeout(function () {
                methods.fadeIn.apply($this);
            }, state.fadeOutInterval);
            return $this;
        },

        fadeIn : function () {
            var $this = $(this), state = $this.data('state');
            var cur = state.cur, next = (state.cur + 1) % state.end;
            
            state.cur = next;
            $this.data('state', state);
            $($('img', $this).get(cur)).show().parent().fadeOut(state.fadeOutInterval);
            $($('img', $this).get(next)).show().parent().fadeIn(state.fadeInInterval);
            
            // Set button state
            $('.buttonOn').removeClass('buttonOn');
            $($('#slideshow-buttons li a').get(state.cur)).addClass('buttonOn');

            // Show caption
            $('.slideshow-caption').hide();
            $($('.slideshow-caption').get(state.cur)).show();

            // Set timer to next state
            $this.data('state').timer = window.setTimeout(function () {
                methods.fadeOut.apply($this);
            }, state.delay - state.fadeOutInterval - state.fadeInInterval);
            return $this;
        }

    };
  
    $.fn.slideshow = function( method ) {
        if ( methods[method] ) return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        else if ( typeof method === 'object' || ! method ) return methods.init.apply( this, arguments );
        else $.error( 'Method ' +  method + ' does not exist on jQuery.slideshow' );
    }

})( jQuery );