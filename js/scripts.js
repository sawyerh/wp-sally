jQuery.noConflict();

jQuery.fn.quickEach = (function() {
   var jq = jQuery([1]);
   return function(c) {
    var i = -1,
        el, len = this.length;
    try {
     while (++i < len && (el = jq[0] = this[i]) && c.call(jq, i, el) !== false);
    } catch (e) {
     delete jq[0];
     throw e;
    }
    delete jq[0];
    return this;
   };
}());

(function($){
    
    // Code here
	
})(jQuery);