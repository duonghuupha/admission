<?php $setting = $this->_Data->get_setting(); $admission = $this->_Data->get_setting_admission(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tuyển sinh :: <?php echo $setting[0]['title'] ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/home/' ?>assets/icomoon.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo URL.'/styles/home/' ?>assets/style.css">
    <link rel="shortcut icon" href="<?php echo URL ?>/styles/home/images/edusoft.png" />
</head>
<body>
    <div id="body-wrap">
        <div class="row">
            <div class="col-8">
                <div class="container">
                    <header id="header">
                        <div class="logo">
                            <img src="<?php echo URL.'/styles/home/' ?>images/Logo_tuyen_sinh.png" alt="logo">
                        </div>
                    </header>
                    <div class="main-content">
                        <div class="page-title">
                            <h1>THỜI GIAN TUYỂN SINH SẼ BẮT ĐẦU SAU!</h1>
                            <div id="countdown-clock">
                                <div class="time">
                                    <span class="days"></span>
                                    <small>Ngày</small>
                                </div>
                                <div class="time">
                                    <span class="hours"></span>
                                    <small>Giờ</small>
                                </div>
                                <div class="time">
                                    <span class="minutes"></span>
                                    <small>Phút</small>
                                </div>
                                <div class="time">
                                    <span class="seconds"></span>
                                    <small>Giây</small>
                                </div>
                            </div>
                        </div><!--page-title-->
                    </div><!--main-content-->
                    <footer id="footer">
                        <div class="copyright">
                            <p>Hệ thống tuyển sinh <a href="<?php echo $setting[0]['website'] ?>" target="_blank"><?php echo $setting[0]['title'] ?></a> <?php echo date("Y") ?>.</p>
                        </div>
                    </footer>
                </div>
            </div><!--col-8-->
            <div class="col-4">
                <img src="<?php echo URL.'/styles/home/' ?>images/Image_Side_admission.png" alt="wallpaper" class="sideimg">
            </div>
        </div><!--row-->
    </div><!--body-wrap-->
    <script type="text/javascript">
        function getTimeRemaining(endtime) {
            const total = Date.parse(endtime) - Date.parse(new Date());
            const seconds = Math.floor((total / 1000) % 60);
            const minutes = Math.floor((total / 1000 / 60) % 60);
            const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
            const days = Math.floor(total / (1000 * 60 * 60 * 24));
            return {total, days, hours, minutes, seconds};
        }
        function initializeClock(id, endtime) {
            const clock = document.getElementById(id);
            const daysSpan = clock.querySelector('.days');
            const hoursSpan = clock.querySelector('.hours');
            const minutesSpan = clock.querySelector('.minutes');
            const secondsSpan = clock.querySelector('.seconds');
            function updateClock() {
                const t = getTimeRemaining(endtime);
                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
                if (t.total <= 0) {
                    clearInterval(timeinterval);
                }
            }
            updateClock();
            const timeinterval = setInterval(updateClock, 1000);
        }
        //const deadline = new Date(Date.parse(new Date()) + 30 * 24 * 60 * 60 * 1000);
        const deadline = new Date(<?php echo date("Y", strtotime($admission[0]['date_start'])) ?>, <?php echo date("m", strtotime($admission[0]['date_start'])) - 1 ?>, <?php echo date("d", strtotime($admission[0]['date_start'])) ?>, 0, 0, 0); // YYYY, MM (0-11), DD, HH, MM, SS
        initializeClock('countdown-clock', deadline); console.log(deadline);
    </script>


</body>

</html>