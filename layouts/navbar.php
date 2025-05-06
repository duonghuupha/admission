<?php $setting = $this->_Data->get_setting(); $admission = $this->_Data->get_setting_admission(); ?>
<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="<?php echo URL.'/index' ?>" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    TUYỂN SINH ĐẦU CẤP :: <?php echo mb_strtoupper($setting[0]['title'], 'UTF-8') ?> :: EDUSOFT
                </small>
            </a>
        </div>
    </div><!-- /.navbar-container -->
</div>