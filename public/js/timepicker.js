$(function () {
    $('.timepicker').timepicker({
      disableMousewheel: true,
      icons: {
          up: 'la la-angle-up',
          down: 'la la-angle-down'
      },
      showSeconds: true,
      showMeridian: false,
      defaultTime: new Date()
    }).on('changeTime.timepicker', function (e) {

      var hours = ('0' + e.time.hours).slice(-2);
      var minutes = ('0' + e.time.minutes).slice(-2);
      var seconds = ('0' + e.time.seconds).slice(-2);

      $(this).val(hours + ':' + minutes + ':' + seconds);
    });
})