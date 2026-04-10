$(document).ready(function(){

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },

        beforeSend() {
            showLoader();
        },

        complete() {
            hideLoader();
        }
	});
})

if (typeof TomSelect !== 'undefined') {
    const selects = document.querySelectorAll('.tomSelect');

    if (selects.length) {
        selects.forEach(el => {
            new TomSelect(el, {
                maxOptions: 5000,
                render: {
                    option: function(data, escape) {
                        return `<div class="py-2 px-3">
                                    <span class="font-medium hover:text-indigo-500">${escape(data.text)}</span>
                                </div>`;
                    }
                }
            });
        });
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

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showLoader() {
    document.getElementById("globalLoader").classList.remove("hidden");
}


function hideLoader(){
    document.getElementById("globalLoader").classList.add("hidden");
}