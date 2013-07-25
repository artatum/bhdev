(function ($) {
  Drupal.behaviors.atTimeout_egp = {
    attach: function(context) {
      $('#tripanel .region-three-33-first .block-inner,#tripanel .region-three-33-second .block-inner,#tripanel .region-three-33-third .block-inner').equalHeight();
      $('#bipanel .region-two-50-first .block-inner,#bipanel .region-two-50-second .block-inner').equalHeight();
      $('#tripanel-2 .region-three-50-25-25-first .block-inner,#tripanel-2 .region-three-50-25-25-second .block-inner,#tripanel-2 .region-three-50-25-25-third .block-inner').equalHeight();
      $('#tripanel-3 .region-three-25-25-50-first .block-inner,#tripanel-3 .region-three-25-25-50-second .block-inner,#tripanel-3 .region-three-25-25-50-third .block-inner').equalHeight();
      $('#footerpanel .block-inner').equalHeight();
    }
  };
})(jQuery);
