<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2"></div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <form id="fm" method="POST" enctype="multipart/form-data">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Họ và tên 
                                    <span style="color:red">(*)</span></label>
                                <div>
                                    <input type="text" id="fullname" name="fullname" style="width:100%" required="" placeholder="Họ và tên học sinh"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Số định danh cá nhân
                                    <span style="color:red">(*)</span>
                                </label>
                                <div>
                                    <input type="text" id="identifi" name="identifi" style="width:100%" maxlength="12" class="form-control"
                                    placeholder="Số định danh cá nhân của học sinh" required="" onkeypress="validate(event)"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Giới tính
                                    <span style="color:red">(*)</span>
                                </label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn giới tính..." style="width:100%"
                                    required="" id="gender" name="gender" data-minimum-results-for-search="Infinity">
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Ngày sinh (dd-mm-yyyy)
                                    <span style="color:red">(*)</span>
                                </label>
                                <div>
                                    <input type="text" id="birthday" name="birthday" style="width:100%" class="form-control input-mask-date"
                                    placeholder="Ngày sinh" required="" onkeypress="validate(event)"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Nơi sinh
                                    <span style="color:red">(*)</span>
                                </label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn nơi sinh..." style="width:100%"
                                    required="" id="add_born" name="add_born"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Dân tộc
                                    <span style="color:red">(*)</span>
                                </label>
                                <div>
                                    <select class="select2" data-placeholder="Lựa chọn dân tộc..." style="width:100%"
                                    required="" id="nation" name="nation"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Đối tượng chính sách
                                </label>
                                <div>
                                    <input type="text" id="object" name="object" style="width:100%" placeholder="Đối tượng chính sách" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Học sinh khuyết tật
                                </label>
                                <div>
                                    <input type="text" id="disability" name="disability" style="width:100%" placeholder="Học sinh khuyết tật" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="form-field-username">
                                    Email
                                    <span style="color:red">(*)</span>
                                </label>
                                <div>
                                    <input type="text" id="email" name="email" style="width:100%" placeholder="Email" required=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="font-size:14px;font-weight:700;color:#307ECC">Nơi thường trú:</legend>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Tỉnh/TP
                                            <span style="color:red">(*)</span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn tỉnh/tp..." style="width:100%"
                                            required="" id="province_id_resident" name="province_id_resident" onchange="set_district(this.value)"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Quận/Huyện
                                            <span style="color:red">(*)</span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn quận/huyện..." style="width:100%"
                                            required="" id="district_id_resident" name="district_id_resident" onchange="set_commune(this.value)"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Xã/Phường
                                            <span style="color:red">(*)</span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn xã/phường..." style="width:100%"
                                            required="" id="commune_id_resident" name="commune_id_resident" onchange="set_village(this.value)"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Thôn/Tổ
                                            <span id="village_resident" style="color:red"></span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn thôn/tổ..." style="width:100%"
                                            id="village_id_resident" name="village_id_resident"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Xóm (Khu phố)
                                        </label>
                                        <div>
                                            <input type="text" id="town_resident" name="town_resident" style="width:100%" placeholder="Xóm (Khu phố)"/>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="font-size:14px;font-weight:700;color:#307ECC">Nơi hiện tại:</legend>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Tỉnh/TP
                                            <span style="color:red">(*)</span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn tỉnh/tp..." style="width:100%"
                                            required="" id="province_id_residence" name="province_id_residence" onchange="set_district_residence(this.value)"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Quận/Huyện
                                            <span style="color:red">(*)</span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn quận/huyện..." style="width:100%"
                                            required="" id="district_id_residence" name="district_id_residence" onchange="set_commune_residence(this.value)"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Xã/Phường
                                            <span style="color:red">(*)</span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn xã/phường..." style="width:100%"
                                            required="" id="commune_id_residence" name="commune_id_residence" onchange="set_village_residence(this.value)"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Thôn/Tổ
                                            <span id="village_residence" style="color:red"></span>
                                        </label>
                                        <div>
                                            <select class="select2" data-placeholder="Lựa chọn thôn/tổ..." style="width:100%"
                                            id="village_id_residence" name="village_id_residence"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="form-field-username">
                                            Xóm (Khu phố)
                                        </label>
                                        <div>
                                            <input type="text" id="town_residence" name="town_residence" style="width:100%" placeholder="Xóm (Khu phố)"/>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Thông tin cha</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Họ tên cha
                                                    </label>
                                                    <div>
                                                        <input type="text" id="fullname_father" name="fullname_father" style="width:100%" placeholder="Họ tên cha"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Năm sinh cha
                                                    </label>
                                                    <div>
                                                        <input type="text" id="birthday_father" name="birthday_father" style="width:100%" placeholder="Năm sinh của cha"
                                                        onkeypress="validate(event)" maxlength="4"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Số điện thoại cha
                                                    </label>
                                                    <div>
                                                        <input type="text" id="phone_father" name="phone_father" style="width:100%" placeholder="Điện thoại của cha"
                                                        onkeypress="validate(event)" maxlength="10"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Nghề nghiệp cha
                                                    </label>
                                                    <div>
                                                        <input type="text" id="job_father" name="job_father" style="width:100%" placeholder="Nghề nghiệp của cha"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Số CCCD cha
                                                    </label>
                                                    <div>
                                                        <input type="text" id="identifi_father" name="identifi_father" style="width:100%" placeholder="Số CCCD của cha"
                                                        onkeypress="validate(event)" maxlength="12"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Thông tin mẹ</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Họ tên mẹ
                                                    </label>
                                                    <div>
                                                        <input type="text" id="fullname_mother" name="fullname_mother" style="width:100%" placeholder="Họ tên mẹ" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Năm sinh mẹ
                                                    </label>
                                                    <div>
                                                        <input type="text" id="birthday_mother" name="birthday_mother" style="width:100%" placeholder="Năm sinh của mẹ"
                                                        onkeypress="validate(event)" maxlength="4"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Số điện thoại mẹ
                                                    </label>
                                                    <div>
                                                        <input type="text" id="phone_mother" name="phone_mother" style="width:100%" placeholder="Điện thoại của mẹ"
                                                        onkeypress="validate(event)" maxlength="10"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Nghề nghiệp mẹ
                                                    </label>
                                                    <div>
                                                        <input type="text" id="job_mother" name="job_mother" style="width:100%" placeholder="Nghề nghiệp của mẹ"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Số CCCD mẹ
                                                    </label>
                                                    <div>
                                                        <input type="text" id="identifi_mother" name="identifi_mother" style="width:100%" placeholder="Số CCCD của mẹ"
                                                        onkeypress="validate(event)" maxlength="12"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="widget-title">Người giám hộ</h4>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Họ tên
                                                    </label>
                                                    <div>
                                                        <input type="text" id="fullname_guar" name="fullname_guar" style="width:100%" placeholder="Họ tên" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Năm sinh
                                                    </label>
                                                    <div>
                                                        <input type="text" id="birthday_guar" name="birthday_guar" style="width:100%" placeholder="Năm sinh"
                                                        onkeypress="validate(event)" maxlength="4"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Số điện thoại
                                                    </label>
                                                    <div>
                                                        <input type="text" id="phone_guar" name="phone_guar" style="width:100%" placeholder="Điện thoại"
                                                        onkeypress="validate(event)" maxlength="10"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Nghề nghiệp
                                                    </label>
                                                    <div>
                                                        <input type="text" id="job_guar" name="job_guar" style="width:100%" placeholder="Nghề nghiệp"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="form-field-username">
                                                        Số CCCD
                                                    </label>
                                                    <div>
                                                        <input type="text" id="identifi_guar" name="identifi_guar" style="width:100%" placeholder="Số CCCD"
                                                        onkeypress="validate(event)" maxlength="12"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-12 col-sm-12 col-md-2"></div>
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/index.js"></script>