$(document).ready(function(){
	if ($.fn.dataTable) {
        $('.datatable').dataTable()
    }
	
    if ($.fn.simpleMoneyFormat) {
        $('.money').simpleMoneyFormat();
    }

    if ($.fn.flatpickr) {
        $(".flatpickr-range").flatpickr({
            mode: "range",
            dateFormat: "d/m/Y",
            // minDate: "today",
            locale: {
                // ...flatpickr.l10ns.vn,
                rangeSeparator: " - "
            }
        });

        $(".flatpickr").flatpickr({
            dateFormat: "d-m-Y"
            // locale: {
            //     ...flatpickr.l10ns.vn
            // }
        });
    }
    
    if ($.fn.select2) {
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: "Lựa chọn",
            allowClear: true
        });

        $('#exhibition').select2({
            width: '100%',
            allowClear: true,
            templateResult: formatExhibition,
            templateSelection: formatExhibition,
            escapeMarkup: function (markup) {
                return markup;
            }
        });
    }
    
});

function formatExhibition(option) {
    if (!option.id) return option.text;

    const logo = $(option.element).data('logo');
    if (!logo) return option.text;

    return `
        <div class="d-flex align-items-center gap-2">
            <img src="${logo}">
            <span>${option.text}</span>
        </div>
    `;
}

function selectLang(lang_id = null, lang_name = null) {
    if(lang_id != null && lang_name != null) {
        setCookie('lang_id', lang_id)
        setCookie('lang_name', lang_name)
        
        location.reload()
    } else {
        alert('lang error')
    }
}

function setCookie(name, value, days = 30) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

if ($.fn.fancybox) {
    $('[data-fancybox]').fancybox({
        buttons: [
            'close'
        ],
        wheel: true,
        transitionEffect: "slide",
        thumbs: true,
        hash: true,
        loop: true,
        keyboard: true,
        toolbar: true,
        animationEffect: true,
        arrows: true,
        clickContent: true
    });
}


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

if ($.fn.multiSelect) {
    $('.multi-select.multi-select-group').multiSelect({
        selectableOptgroup: true,
        selectableHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='Tìm kiếm'>",
        selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='Tìm kiếm'>",
        afterInit: function (container) {
            var that = this;
            var selectableSearch = that.$selectableUl.prev();
            var selectionSearch = that.$selectionUl.prev();
            var selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)';
            var selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

            that.qs1 = selectableSearch.quicksearch(selectableSearchString).on('keydown', function(e){
                if (e.which === 13 && !e.ctrlKey) {
                    return false;
                }
                if (e.which === 40){
                    that.$selectionUl.focus();
                    return false;
                }
            });

            that.qs2 = selectionSearch.quicksearch(selectionSearchString).on('keydown', function(e) {
                if (e.which === 13 && !e.ctrlKey) {
                    return false;
                }
                if (e.which === 40){
                    that.$selectionUl.focus();
                    return false;
                }
            });
        },
        afterSelect: function (values) {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function (values) {
            this.qs1.cache();
            this.qs2.cache();
        }
    });
}

function selectedID() {
    let arr_id = [];
    $('.checkbox_id:checked').each(function() {
        arr_id.push(this.value)
    });
    return arr_id;
}

$('body').on('click', '.choose_image', function(){

    var parent = $(this).parents('.group_image')

    CKFinder.popup({
        chooseFiles: true,
        width: 1500,
        height: 800,
        onInit: function( finder ) {
            finder.on('files:choose', function( evt ) {
                var file = evt.data.files.first();
                var url = file.getUrl()
                $(parent).find('.image_value').val(url)
                $(parent).find('.preview').attr('src', url)
                $(parent).find('[data-fancybox=gallery]').attr('href', url)
            });
        }
    });
});

$('.btn_del_multi').click(function(){

    if(!confirm('Bạn chắc chắn muốn thực hiện hành động này ?')) return false;

    const url  = $('#url').val();

    if(selectedID() < 1) {

        notify('Cảnh báo', 'Vui lòng chọn ít nhất 1 bản ghi', 'warning');
        return false;

    } else {

        arr_id = selectedID().join(';');
        location.assign(`${url}?id=${arr_id}`);

    }
});

// Áp dụng cho TẤT CẢ table có checkbox checkall
$(document).on('change', 'table .checkall', function () {
    const $table = $(this).closest('table');
    const checked = this.checked;

    // Chỉ check checkbox trong tbody của table hiện tại
    $table.find('tbody input[type="checkbox"]').prop('checked', checked);
});

// Khi click từng checkbox trong tbody
$(document).on('change', 'table tbody input[type="checkbox"]', function () {
    const $table = $(this).closest('table');
    const $checkboxes = $table.find('tbody input[type="checkbox"]');
    const checkedCount = $checkboxes.filter(':checked').length;

    // Update lại checkbox "check all" trong thead
    $table.find('thead .checkall').prop(
        'checked',
        checkedCount === $checkboxes.length
    );
});

function notify(title = 'Notify Title', text = 'Notify text lorem ipsum', status = 'success') {
    new Notify({
        status: status,
        title: title,
        text: text,
        effect: 'slide',
        speed: 300,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 10000,
        gap: 20,
        distance: 20,
        type: 'outline',
        position: 'right top'
    })
}

$(".avatar").change(function(e) {

    const size_set = 2

    var files = e.target.files,
        size = files[0].size,
        size = (size / 1024) / 1014;

    if(size > size_set) {
        toastr.error(`Ảnh không vượt quá ${size_set}MB`)
        return false;
    }

    if (files[0]) {
        const reader = new FileReader();
        const that = this;
        reader.onload = function(e) {
            var file = e.target.result;
            const parents = $(that).parents('.group_image')
            parents.find('.preview').attr('src', file);
            parents.find('[data-fancybox=gallery]').attr('href', file);
        }

        reader.readAsDataURL(files[0]);
    }
});

function setStep(currentStep) {
    if(currentStep == null || currentStep == undefined) currentStep = 0
    updateProgress(currentStep); // gọi 1 lần thôi

    $('.step').each(function () {
        let step = $(this).data('step');

        $(this).removeClass('active completed');

        if (step < currentStep) {
            $(this).addClass('completed');
        } else if (step == currentStep) {
            $(this).addClass('active');
        }
    });
}

function updateProgress(currentStep) {
    let totalSteps = $('.step').length;

    let percent = Math.round((currentStep / (totalSteps - 1)) * 100);

    $('#progressBar').css('width', percent + '%');
    $('#progressBar #text-progress').text(percent + '%');
    $('[name="progress"]').val(currentStep); // lưu step, không phải %
}

$('.step').click(function () {
    let step = $(this).data('step');
    setStep(step); 
});