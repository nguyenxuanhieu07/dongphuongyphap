jQuery(document).ready(function($){
    var d = new Date();
    $('#bulk-edit .inline-edit-col-right .inline-edit-col')
        .append(
            '<fieldset class="inline-edit-date"><legend><span class="title">Thời gian</span></legend><div class="timestamp-wrap"><label><span class="screen-reader-text">Tháng</span>'
            + '<select class="form-required" name="mm">'
            + '<option value="00">Month</option>'
            + '<option value="01">01-January</option>'
            + '<option value="02">02-February</option>'
            + '<option value="03">03-March</option>'
            + '<option value="04">04-April</option>'
            + '<option value="05">05-May</option>'
            + '<option value="06">06-June</option>'
            + '<option value="07">07-July</option>'
            + '<option value="08">08-August</option>'
            + '<option value="09">09-September</option>'
            + '<option value="10">10-October</option>'
            + '<option value="11">11-November</option>'
            + '<option value="12">12-December</option>'
            + '</select></label>'
            + '<label><span class="screen-reader-text">Ban ngày</span><input type="text" name="jj" value="01" size="2" maxlength="2" autocomplete="off" class="form-required" /></label>,'
            + '<label><span class="screen-reader-text">Năm</span><input type="text" name="aa" value="' + d.getFullYear() + '" size="4" maxlength="4" autocomplete="off" class="form-required" /></label> vào lúc'
            + '<label><span class="screen-reader-text">Giờ</span><input type="text" name="hh" value="00" size="2" maxlength="2" autocomplete="off" class="form-required" /></label>:'
            + '<label><span class="screen-reader-text">Phút</span><input type="text" name="mn" value="00" size="2" maxlength="2" autocomplete="off" class="form-required" /></label></div>'
            + '<input type="hidden" id="ss" name="ss" value="06" /></fieldset>'
    );
});