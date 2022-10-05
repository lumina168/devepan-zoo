
    <!-- 土日は閉館日 -->
    <?php
    date_default_timezone_set('Asia/Tokyo');
    $today = getdate();
    if ($today['wday'] == 0 || $today['wday'] == 6) {
        echo "今日は閉園日";
    } else  {
        echo "今日は開園日";
    }
    ?>
