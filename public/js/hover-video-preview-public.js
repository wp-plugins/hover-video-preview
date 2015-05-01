(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note that this assume you're going to use jQuery, so it prepares
	 * the $ function reference to be used within the scope of this
	 * function.
	 *
	 * From here, you're able to define handlers for when the DOM is
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and so on.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */

    $(document).ready(function() {
        $('.hvp-container').each(function(index) {
            var preview = $(this);

            preview.tooltipster({
                position: 'top',
                contentAsHTML: true,
                content: '<div class="hvp-video-wrapper"><div id="hvp-player-'+index+'"></div></div>',
                functionReady: function() {
                    if(preview.data('provider') == 'youtube') {
                        var player = new YT.Player('hvp-player-'+index, {
                            videoId: preview.data('video-id'),
                            playerVars: {
                                'autoplay': 1,
                                'controls': 0
                            },
                            events: {
                                'onReady': function(event) {
                                    event.target.playVideo();
                                }
                            }
                        });
                    }
                }
            });
        });
    });

})( jQuery );

// usage: log('inside coolFunc',this,arguments);
// http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
    log.history = log.history || [];   // store logs to an array for reference
    log.history.push(arguments);
    if(this.console){
        console.log( Array.prototype.slice.call(arguments) );
    }
};
