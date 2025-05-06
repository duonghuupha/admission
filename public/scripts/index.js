$(function(){
    $('.input-mask-date').mask('99-99-9999'); combo_select_2('#province_id_resident', baseUrl + '/other/combo_province', 0, ''); 
    combo_select_2('#province_id_residence', baseUrl + '/other/combo_province', 0, '');
    combo_select_2('#add_born', baseUrl + '/other/combo_province', 0, ''); combo_select_2('#nation', baseUrl + '/other/combo_nation', 0, '');
});

function save(){
    var required = $('#fm input, #fm textarea, #fm select').filter('[required]:visible');
    var allRequired = true;
    required.each(function(){
        if($(this).val() == ''){
            allRequired = false;
        }
    });
    if(allRequired && validateEmail($('#email').val())){
        var father = check_father(), mother = check_mother(), guardian = check_guardian();
        if(father == 0 && mother == 0 && guardian == 0){ // khong co thong tin cha me nguoi giam ho
            show_message("error", "Phải có ít nhất một thông tin cha, mẹ hoặc người giám hộ");
        }else{
            if(father == 2 || mother == 2 || guardian == 2){ // co nhap thong tin nhung khong du    
                show_message("error", "Thông tin cha, mẹ, người giám hộ chưa đủ hoặc nhập chưa chính xác. Vui lòng kiểm tra lại!");
            }else{
                var xhr = new XMLHttpRequest();
                var formData = new FormData($('#fm')[0]);
                $('.overlay').show();
                $.ajax({
                    url: baseUrl + '/index/add',  //server script to process data
                    type: 'POST',
                    xhr: function() {
                        return xhr;
                    },
                    data: formData,
                    success: function(data){
                        var result = JSON.parse(data);
                        if(result.success == true){
                            $('.overlay').hide();
                            $('#exampleModal').modal('show');
                        }else{
                            $('.overlay').hide();
                            show_message('error', result.msg);
                            return false;
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        }
    }else{
        show_message("error", "Chưa điền đủ thông tin");
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function set_district(val){
    $('#district_id_resident').val('').trigger('change'); $('#commune_id_resident').val('').trigger('change'); $('#village_id_resident').val('').trigger('change');
    combo_select_2('#district_id_resident', baseUrl + '/other/combo_district?code_province='+val, 0, '');
    $('#village_resident').text(''); $('#village_id_resident').attr("required", false);
}

function set_commune(val){
    $('#commune_id_resident').val('').trigger('change'); $('#village_id_resident').val('').trigger('change');
    combo_select_2('#commune_id_resident', baseUrl + '/other/combo_commune?code_district='+val, 0, '');
    $('#village_resident').text(''); $('#village_id_resident').attr("required", false);
}

function set_village(val, village_id = 0, village = ''){ // val la ma xa phuong
    // kiem tra xem xa phuong co thuoc khu vuc tuyen sinh khong
    $.getJSON(baseUrl + '/index/check_village?code_commune='+val, function(data){
        if(data == 1){ // co nam trong tuyen sinh
            $('#village_resident').text('(*)'); $('#village_id_resident').attr("required", true);
            combo_select_2('#village_id_resident', baseUrl + '/other/combo_village?code_commune='+val, village_id, village);
        }else{
            $('#village_resident').text(''); $('#village_id_resident').attr("required", false);
            $('#village_id_resident').val('').trigger('change');
        }
    });
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function set_district_residence(val){
    $('#district_id_residence').val('').trigger('change'); $('#commune_id_residence').val('').trigger('change'); $('#village_id_residence').val('').trigger('change');
    combo_select_2('#district_id_residence', baseUrl + '/other/combo_district?code_province='+val, 0, '');
    $('#village_residence').text(''); $('#village_id_residence').attr("required", false);
}

function set_commune_residence(val){
    $('#commune_id_residence').val('').trigger('change'); $('#village_id_residence').val('').trigger('change');
    combo_select_2('#commune_id_residence', baseUrl + '/other/combo_commune?code_district='+val, 0, '');
    $('#village_residence').text(''); $('#village_id_residence').attr("required", false);
}

function set_village_residence(val, village_id = 0, village = ''){ // val la ma xa phuong
    // kiem tra xem xa phuong co thuoc khu vuc tuyen sinh khong
    $.getJSON(baseUrl + '/index/check_village?code_commune='+val, function(data){
        if(data == 1){ // co nam trong tuyen sinh
            $('#village_residence').text('(*)'); $('#village_id_residence').attr("required", true);
            combo_select_2('#village_id_residence', baseUrl + '/other/combo_village?code_commune='+val, village_id, village);
        }else{
            $('#village_residence').text(''); $('#village_id_residence').attr("required", false);
            $('#village_id_residence').val('').trigger('change');
        }
    });
}
/***********************************************************************************************************************************/
function check_father(){
    var fullname = $('#fullname_father').val(), birthday = $('#birthday_father').val();
    var phone = $('#phone_father').val(), job = $('#job_father').val(), identifi = $('#identifi_father').val();
    if(fullname.length > 0 || birthday.length > 0 || phone.length > 0 || job.length > 0 || identifi.length > 0){ // kiem tra xem co nhap thong tin cha khong
        if(fullname.length > 0 && birthday.length > 0 && phone.length > 0 && job.length > 0 && identifi.length > 0){ // nhap du
            if(birthday.length < 4 && phone.length < 10 && identifi.length < 12){
                return 2; // co nhap thong tin nhung khong du
            }else{
                return 1; // nhap du
            }
        }else{
            return 2; // co nhap thong tin nhung khong du
        }
    }else{
        return 0; // khong nhap thong tin cha
    }
}

function check_mother(){
    var fullname = $('#fullname_mother').val(), birthday = $('#birthday_mother').val();
    var phone = $('#phone_mother').val(), job = $('#job_mother').val(), identifi = $('#identifi_mother').val();
    if(fullname.length > 0 || birthday.length > 0 || phone.length > 0 || job.length > 0 || identifi.length > 0){ // kiem tra xem co nhap thong tin me khong
        if(fullname.length > 0 && birthday.length > 0 && phone.length > 0 && job.length > 0 && identifi.length > 0){ // nhap du
            if(birthday.length < 4 && phone.length < 10 && identifi.length < 12){
                return 2; // co nhap thong tin nhung khong du
            }else{
                return 1; // nhap du
            }
        }else{
            return 2; // co nhap thong tin nhung khong du
        }
    }else{
        return 0; // khong nhap thong tin me
    }
}

function check_guardian(){
    var fullname = $('#fullname_guar').val(), birthday = $('#birthday_guar').val();
    var phone = $('#phone_guar').val(), job = $('#job_guar').val(), identifi = $('#identifi_guar').val();
    if(fullname.length > 0 || birthday.length > 0 || phone.length > 0 || job.length > 0 || identifi.length > 0){ // kiem tra xem co nhap thong tin nguoi giam ho khong
        if(fullname.length > 0 && birthday.length > 0 && phone.length > 0 && job.length > 0 && identifi.length > 0){ // nhap du
            if(birthday.length < 4 && phone.length < 10 && identifi.length < 12){
                return 2; // co nhap thong tin nhung khong du
            }else{
                return 1; // nhap du
            }
        }else{
            return 2; // co nhap thong tin nhung khong du
        }
    }else{
        return 0; // khong nhap thong tin nguoi giam ho
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function check_identifi(value){
    if(value.length < 12){
        $('#identifi').val(''); $('#identifi').focus(); 
        show_message("error", "Số định danh cá nhân không hợp lệ. Vui lòng kiểm tra lại!");
    }
}

function check_format_birthday_student(value){
    //console.log(value);
    var row = value.split('-');
    var day = row[0], month = row[1], year = row[2];
    if(day.length < 2 || month.length < 2 || year.length < 4){
        $('#birthday').val(''); $('#birthday').focus(); 
        show_message("error", "Ngày sinh không hợp lệ. Vui lòng kiểm tra lại!");    
    }else{
        if(parseInt(month) > 12 || parseInt(day) > 31){
            $('#birthday').val(''); $('#birthday').focus(); 
            show_message("error", "Ngày sinh không hợp lệ. Vui lòng kiểm tra lại!");
        }else{
            $.getJSON(baseUrl + '/index/check_year_admission?year='+year, function(data){
                if(data == 0){ // nam nay khong co tuyen sinh
                    if(confirm("Năm sinh của học sinh không nằm trong thời gian tuyển sinh. Bạn có muốn tiếp tục không?\nHệ thống sẽ tự động chuyển sang trang tuyển sinh đầu cấp của Thành phố Hà Nội.")){
                        window.location.href = 'https://tsdaucap.hanoi.gov.vn/dang-ky'; // chuyen den trang tuyen sinh dau cap
                    }else{
                        $('#birthday').val(''); $('#birthday').focus(); 
                        show_message("error", "Ngày sinh không hợp lệ. Vui lòng kiểm tra lại!");
                    }
                }
            });
        }
    }
}