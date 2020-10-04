<script src="<?php echo base_url('landing_page/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/jquery-ui.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/popper.min.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/owl.carousel.min.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/jquery.countdown.min.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/jquery.easing.1.3.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/aos.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/jquery.fancybox.min.js')?>"></script>
  <script src="<?php echo base_url('landing_page/js/jquery.sticky.js')?>"></script>

  
  <script src="<?php echo base_url('landing_page/js/main.js')?>"></script>

  <script type="text/javascript">
    (function ($) {
  $.fn.countTo = function (options) {
    options = options || {};
    
    return $(this).each(function () {
      // set options for current element
      var settings = $.extend({}, $.fn.countTo.defaults, {
        from:            $(this).data('from'),
        to:              $(this).data('to'),
        speed:           $(this).data('speed'),
        refreshInterval: $(this).data('refresh-interval'),
        decimals:        $(this).data('decimals')
      }, options);
      
      // how many times to update the value, and how much to increment the value on each update
      var loops = Math.ceil(settings.speed / settings.refreshInterval),
        increment = (settings.to - settings.from) / loops;
      
      // references & variables that will change with each update
      var self = this,
        $self = $(this),
        loopCount = 0,
        value = settings.from,
        data = $self.data('countTo') || {};
      
      $self.data('countTo', data);
      
      // if an existing interval can be found, clear it first
      if (data.interval) {
        clearInterval(data.interval);
      }
      data.interval = setInterval(updateTimer, settings.refreshInterval);
      
      // initialize the element with the starting value
      render(value);
      
      function updateTimer() {
        value += increment;
        loopCount++;
        
        render(value);
        
        if (typeof(settings.onUpdate) == 'function') {
          settings.onUpdate.call(self, value);
        }
        
        if (loopCount >= loops) {
          // remove the interval
          $self.removeData('countTo');
          clearInterval(data.interval);
          value = settings.to;
          
          if (typeof(settings.onComplete) == 'function') {
            settings.onComplete.call(self, value);
          }
        }
      }
      
      function render(value) {
        var formattedValue = settings.formatter.call(self, value, settings);
        $self.html(formattedValue);
      }
    });
  };
  
  $.fn.countTo.defaults = {
    from: 0,               // the number the element should start at
    to: 0,                 // the number the element should end at
    speed: 1000,           // how long it should take to count between the target numbers
    refreshInterval: 100,  // how often the element should be updated
    decimals: 0,           // the number of decimal places to show
    formatter: formatter,  // handler for formatting the value before rendering
    onUpdate: null,        // callback method for every time the element is updated
    onComplete: null       // callback method for when the element finishes updating
  };
  
  function formatter(value, settings) {
    return value.toFixed(settings.decimals);
  }
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
  formatter: function (value, options) {
    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
  }
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
  var $this = $(this);
  options = $.extend({}, options || {}, $this.data('countToOptions') || {});
  $this.countTo(options);
  }
});


  </script>