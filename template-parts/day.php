<!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー  -->
<!-- 日付パーツ -->
<!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー  -->

<p class="p-content__today">TODAY</p>
<div class="p-content__month">
    <span>
        <?php echo wp_date('Y'); //年月日を表示
        ?>
    </span>
    <span>
        <?php echo wp_date('m'); //年月日を表示
        ?>
    </span>
</div>
<div class="p-content__day">
    <span>
        <?php
        $week = array('SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'); //曜日を用意
        echo '（' . $week[wp_date('w')]  . '）'; //曜日を表示
        ?>
    </span>
    <span>
        <?php echo wp_date('d'); //年月日を表示
        ?>
    </span>
</div>