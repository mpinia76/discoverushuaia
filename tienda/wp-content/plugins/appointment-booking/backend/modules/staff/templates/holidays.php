<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div id="ab-annual-calendar-scroll" style="text-align: center;">
  <div class="input-prepend input-append form-inline">
    <span class="prev glyphicon glyphicon-triangle-left"></span>
    <input style="width: 70px!important; text-align: center; background: white; display: inline-block" class="jcal_year form-control" readonly="readonly" id="appendedPrependedInput" size="16" type="text" value="">
    <span class="next glyphicon glyphicon-triangle-right"></span>
  </div>
</div>
<div id="ab-annual-calendar"></div>

<script type="text/javascript">
  jQuery(function($) {
    var d = new Date();
    $('#ab-annual-calendar').jCal({
        day:            new Date(d.getFullYear(), 0, 1),
        days:           1,
        showMonths:     12,
        scrollSpeed:    350,
        events:         <?php echo $holidays ?>,
        action:         'ab_staff_holidays_update',
        staff_id:       <?php echo $staff_id ?>,
        dayOffset:      <?php echo (int) get_option( 'start_of_week' ) ?>
    });
  });
</script>