<script type="text/javascript">
    window.onload = function() {

        function fade( elem, ms )
        {
            if( ! elem ) { console.log('elem missing'); return; }

            if( ! ms ) { console.log('ms missing'); return; }

            var opacity = 1;
            var timer = setInterval( function() {
                opacity -= 50 / ms;
                if( opacity <= 0 )
                {
                    clearInterval(timer);
                    opacity = 0;
                    elem.style.display = "none";
                    elem.style.visibility = "hidden";
                }
                elem.style.opacity = opacity;
                elem.style.filter = "alpha(opacity=" + opacity * 100 + ")";
            }, 50 );

        }

        var preloader_hide_delay = 800;

        setTimeout( function() {
            var image = document.getElementById('icecred-preloader-image');
            fade(image, 450);

            setTimeout( function() {
                var background = document.getElementById('icecred-preloader-bg');
                fade(background, 450);
            }, 350 );

        }, preloader_hide_delay );
    }
</script>
