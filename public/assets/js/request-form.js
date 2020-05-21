//Replace URL after user click to save request form
window.history.pushState('request-save', 'Title', '/request_form');
var active_tab = ($('#bangkokpost-tab').hasClass("active") ? 'bangkokpost' : 'posttoday');
var none_active_tab = ($('#bangkokpost-tab').hasClass("active") ? 'posttoday' : 'bangkokpost');
var options = "";
$('input[type="file"]').attr('title', window.webkitURL ? ' ' : '');

//***------- DOCUMENT READY ------------****
$(document).ready(function() {
    $("select[name*='bp_']").prop('required', true);
    $("input[name*='bp_']").prop('required', true);
});

//Date picker option for default ad description card
$('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true
});

$("body").on('focus', '.datepicker', function() {
    $(this).datepicker({
        autoclose: true,
        todayHighlight: true
    });
});


window.onbeforeunload = function(e) {
    e = e || window.event;

    // For IE and Firefox prior to version 4
    if (e) {
        e.returnValue = 'Any string';
    }

    // For Safari
    return 'Any string';
};


function changeTabOption(element, tab_name) {
    var checkbox = element;
    var checkboxIndex = String(checkbox.attr('id')).match(/\d+/)[0];
    if (checkbox.is(':checked')) {
        $('#' + tab_name + '-ad-card').removeAttr('style');
        switch (checkboxIndex) {
            case '1': //Social
                $('#' + tab_name + '_option1').show();
                $('#' + tab_name + '_option2').hide();
                $('#' + tab_name + '_option1 :input').prop('required', true);
                $('#' + tab_name + '_option2 :input').prop('required', false);
                //$('#' + tab_name + '_option3').hide();

                $('div[id*="' + tab_name + '_device"]').each(function() {
                    $(this).hide();
                    $(this).find('input').prop('disabled', true);
                    $(this).find('input').prop('required', false);
                });
                $('select[name*="' + tab_name + '_position_id"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                    $(this).find('option').prop('selected', false);
                });
                $('input[name*="' + tab_name + '_position_text"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                });
                $('select[name*="' + tab_name + '_section_id"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                    $(this).prop('selected', false);
                });
                $('input[name*="' + tab_name + '_section_text"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                });
                break;
            case '2': //Website
                $('#' + tab_name + '_option1').hide();
                $('#' + tab_name + '_option2').show();
                $('#' + tab_name + '_option1 :input').prop('required', false);
                $('#' + tab_name + '_option2 :input').prop('required', true);
                //$('#' + tab_name + '_option3').hide();
                $('div[id*="' + tab_name + '_device"]').each(function() {
                    $(this).show();
                    $(this).find('input').prop('disabled', false);
                    $(this).find('input').prop('required', true);
                });
                $('select[name*="' + tab_name + '_position_id"]').each(function() {
                    $(this).prop('disabled', false);
                    $(this).prop('required', true);
                });
                $('input[name*="' + tab_name + '_position_text"]').each(function() {
                    $(this).prop('disabled', false);
                    $(this).prop('required', true);
                });
                $('select[name*="' + tab_name + '_section_id"]').each(function() {
                    $(this).prop('disabled', false);
                    $(this).prop('required', true);
                });
                $('input[name*="' + tab_name + '_section_text"]').each(function() {
                    $(this).prop('disabled', false);
                    $(this).prop('required', true);
                });
                break;
            case '3': //E-newsletter
                $('#' + tab_name + '_option1').hide();
                $('#' + tab_name + '_option2').hide();
                $('#' + tab_name + '_option1 :input').prop('required', false);
                $('#' + tab_name + '_option2 :input').prop('required', false);
                //$('#' + tab_name + '_option3').show();
                $('div[id*="' + tab_name + '_device"]').each(function() {
                    $(this).hide();
                    $(this).find('input').prop('disabled', true);
                    $(this).find('input').prop('required', false);
                });
                $('select[name*="' + tab_name + '_position_id"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                    $(this).find('option').prop('selected', false);
                });
                $('input[name*="' + tab_name + '_position_text"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                });
                $('select[name*="' + tab_name + '_section_id"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                    $(this).prop('selected', false);
                });
                $('input[name*="' + tab_name + '_section_text"]').each(function() {
                    $(this).prop('disabled', true);
                    $(this).prop('required', false);
                });
                break;
        }
        $('#' + tab_name + '_facebook_option').hide();
        $('input[id="' + tab_name + '_social1"]').prop('checked', false);
        $('#' + tab_name + '_option1 :input').prop('checked', false);
        $('#' + tab_name + '_option2 :input').prop('checked', false);
        $('#' + tab_name + '_facebook_option :input').prop('checked', false);
        $('#' + tab_name + '_facebook_option :input').prop('disabled', true);
        $('div[id*="' + tab_name + '_device"]').each(function() {
            $(this).find('input').prop('checked', false);
        });
    }
}

function facebookCheckBoxOption(element, tab_name) {
    var checkbox = element;
    var checkboxIndex = String(checkbox.attr('id')).match(/\d+/)[0];
    if (checkbox.is(':checked') && checkboxIndex == "1") { //if user checked on facebook option (ID = 1)
        $('#' + tab_name + '_facebook_option').show();
        $('#' + tab_name + '_facebook_option :input').prop('disabled', false);
    } else if (!checkbox.is(':checked') && checkboxIndex == "1") {
        $('#' + tab_name + '_facebook_option').hide();
        $('#' + tab_name + '_facebook_option :input').prop('checked', false);
    }
}

//Show Bangkokpost campaign option by value from option type 
$('input[id*="bp_type"]').each(function() {
    $(this).on("change", function() {
        changeTabOption($(this), 'bp');
    });
});

$('input[id*="bp_social"]').each(function() {
    $(this).on("change", function() {
        facebookCheckBoxOption($(this), 'bp');
    });
});

//Show Posttoday campaign option by value from option type
$('input[id*="ptd_type"]').each(function() {
    $(this).on("change", function() {
        changeTabOption($(this), 'ptd');
    });
});

$('input[id*="ptd_social"]').each(function() {
    $(this).on("change", function() {
        facebookCheckBoxOption($(this), 'ptd');
    });
});



function requireFieldOnCard(tab_name, value) {
    if (value) {
        var require_status = true;
        for (i = 0; i < 2; i++) {
            if (i == 1) {
                tab_name = (tab_name == 'bp' ? 'ptd' : (tab_name == 'ptd' ? 'bp' : ''));
                require_status = false;
            }
            $("select[name*='" + tab_name + "_']").prop('required', require_status);
            $("input[name*='" + tab_name + "_']").prop('required', require_status);
        }
    }
}

function getCheckBoxIndex(checkbox) {
    return String(checkbox.attr('id')).match(/\d+/)[0];
}
//Create input field before user click submit button
function beforeSubmit() {
    createHiddenField();
    //validateCheckbox(active_tab,none_active_tab);
    //event.preventDefault();
    if ($('div[id*="bp_option1"] :input').is(':checked') || $('div[id*="ptd_option1"] :input').is(':checked')) //remove required property on social option if user checked on social option (at least 1)
    {
        $('input[name*="bp_social"]').each(function() {
            $(this).prop("required", false);
        });
        $('input[name*="ptd_social"]').each(function() {
            $(this).prop("required", false);
            //console.log($(this));
        });
    }

    $('input[id*="bp_type"]').each(function() {
        var boxIndex = getCheckBoxIndex($(this));
        if ($(this).is(':checked') && boxIndex !== '2') {
            $('input[name*="bp_web"]').each(function() {
                $(this).prop("required", false);
            });

            if (boxIndex == '1') {
                $('div[id*="bp_device"]').each(function() {
                    $(this).hide();
                    $(this).find('input').prop('disabled', true);
                    $(this).find('input').prop('required', false);
                    $(this).find('input').prop('checked', false);
                });
            }
        }
    });

    $('input[id*="ptd_type"]').each(function() {
        var boxIndex = getCheckBoxIndex($(this));
        if ($(this).is(':checked') && boxIndex !== '2') {
            $('input[name*="ptd_web"]').each(function() {
                $(this).prop("required", false);
            });
            if (boxIndex == '1') {
                $('div[id*="ptd_device"]').each(function() {
                    $(this).hide();
                    $(this).find('input').prop('disabled', true);
                    $(this).find('input').prop('required', false);
                    $(this).find('input').prop('checked', false);
                });
            }
        }
    });

    $('div[class="custom-file"] :input').each(function() {
        if ($(this).val() !== "") {
            $('div[class="custom-file"] :input').each(function() {
                $(this).prop("required", false);
            });
            return false;
        }
    });
}

function clearPreviousTab(active_tab) {
    previous_tab_name = (active_tab == "bangkokpost" ? "ptd" : "bp");
    //clear all input value on previous tab
    //1. Hiding checkbox option (Type/Social/Facebook)
    $('#' + previous_tab_name + '_option1').hide();
    $('#' + previous_tab_name + '_option2').hide();
    //$('#' + previous_tab_name + '_option3').hide();
    $('#' + previous_tab_name + '_facebook_option').hide();
    //2. reset all input value on previous tab
    var previous_tab_input = document.querySelectorAll("input[name*='" + previous_tab_name + "_']");
    var previous_tab_dropdown = document.querySelectorAll("select[name*='" + previous_tab_name + "_']");
    for (var i = 0; i < previous_tab_input.length; i++) {
        previous_tab_input[i].value = '';
        previous_tab_input[i].required = false;
        previous_tab_input[i].checked = false;
        if (previous_tab_input[i].type == "file") {
            var file_name = $('input[name="' + previous_tab_input[i].name + '"]').val();
            var fIndex = String(previous_tab_input[i].name).match(/\d+/)[0];
            var labelId = String(previous_tab_input[i].name).replace('[' + fIndex + ']', fIndex);
            $('label[id="' + labelId + '"]').text("");
        }
    }
    for (var i = 0; i < previous_tab_dropdown.length; i++) {
        previous_tab_dropdown[i].value = '';
        previous_tab_dropdown[i].selectedIndex = 0;
        previous_tab_dropdown[i].required = false;
    }
}


$('#posttoday-tab').each(function() {
    if ($(this).hasClass("active")) {
        $('.nav-requestForm').addClass('tabs--ptd');
    }
    $(this).on('click', function(e) {
        if (active_tab !== 'posttoday') {
            $('#ptdModal').modal('show');
        }
    })
})

//Event when user clicked on posttoday tab
$('#ptd-modal-submit').click(function(e) {
    //if user change current tab, Show a posstoday tab
    $('.nav-requestForm').addClass('tabs--ptd');
    active_tab = 'posttoday';
    none_active_tab = 'bangkokpost';
    addTabClass(active_tab, none_active_tab); //add and remove some attribute on this tab
    requireFieldOnCard('ptd', true); //add require attribute to input field
    clearPreviousTab(active_tab); //clear all input value on previous tab
    $("div[id*='ptd-ad-card']").hide();
    $("div[id*='ptd-type-container']").hide();
});

//Event when user clicked on bangkokpost tab
$('#bangkokpost-tab').click(function(e) {
    console.log('Hey!');
    if (active_tab !== 'bangkokpost') {
        $('#bpModal').modal('show');
    }
});

$('#bp-modal-submit').click(function(e) {
    //if user change current tab, hide posstoday tab and show bangkokpost tab
    $('.nav-requestForm').removeClass('tabs--ptd');
    active_tab = 'bangkokpost';
    none_active_tab = 'posttoday';
    addTabClass(active_tab, none_active_tab); //add and remove some attribute on this tab
    requireFieldOnCard('bp', true); //add require attribute to input field
    clearPreviousTab(active_tab); //clear all input value on previous tab
    $("div[id*='bp-ad-card']").hide();
    $("div[id*='bp-type-container']").hide();
});

function addTabClass(active_tab, none_active_tab) {
    $("#" + active_tab).addClass('show');
    $("#" + active_tab).addClass('active');
    $("#" + none_active_tab + "-tab").css("background-color", "#F2F2F2");
    $("#" + none_active_tab + "-tab").css("color", "#000");
    $("#" + active_tab + "-tab").css("color", "#ffff");
    $("#" + none_active_tab).removeClass('show');
    $("#" + none_active_tab).removeClass('active');
    if (active_tab == 'posttoday') {
        $("#" + active_tab + "-tab").css("background-color", "#D13E3E");
        $("#myTab").css("border-bottom", "5px solid #D13E3E");
    } else {
        $("#" + active_tab + "-tab").css("background-color", "#396EB5");
        $("#myTab").css("border-bottom", "5px solid #396EB5");
    }
}

//validate checkbox on bangkokpost and posttoday tab
function validateCheckbox(active_tab, none_active_tab) {
    if (!$("input[name*='bp_facebook']:checked").length && !$("input[name*='ptd_facebook']:checked").length) {
        event.preventDefault();
        $("#bp-facebook-tab").css("border", "1px solid #D13E3E ");
        $("#ptd-facebook-tab").css("border", "1px solid #D13E3E ");
        $("#bp-tab-border").css("border", "1px solid #fff ");
        $("#ptd-tab-border").css("border", "1px solid #fff ");
    } else if (!$("input[name*='bp_facebook']:checked").length && $("input[name*='bp_web']:checked").length) {
        event.preventDefault();
        $("#bp-facebook-tab").css("border", "1px solid #D13E3E");
        $("#bp-tab-border").css("border", "1px solid #fff ");
        if ($("input[name*='ptd_facebook']:checked").length || $("input[name*='ptd_facebook']:checked").length) {
            $("#ptd-facebook-tab").css("border", "1px solid #fff");
        } else {
            $("#ptd-facebook-tab").css("border", "1px solid #D13E3E");
        }
        if ($("input[name*='ptd_web']:checked").length) {
            $("#ptd-tab-border").css("border", "1px solid #fff ");
        } else {
            $("#ptd-tab-border").css("border", "1px solid #D13E3E ");
        }
    } else if (!$("input[name*='ptd_facebook']:checked").length && $("input[name*='ptd_web']:checked").length) {
        event.preventDefault();
        $("#ptd-facebook-tab").css("border", "1px solid #D13E3E");
        $("#ptd-tab-border").css("border", "1px solid #fff ");
        if ($("input[name*='bp_facebook']:checked").length) {
            $("#bp-facebook-tab").css("border", "1px solid #fff");
        } else {
            $("#bp-facebook-tab").css("border", "1px solid #D13E3E");
        }
        if ($("input[name*='bp_web']:checked").length) {
            $("#bp-tab-border").css("border", "1px solid #fff ");
        } else {
            $("#bp-tab-border").css("border", "1px solid #D13E3E ");
        }
    } else {
        if ($("input[name*='bp_facebook']:checked").length) {
            $("#bp-facebook-tab").css("border", "1px solid #fff");
            $("#bp-tab-border").css("border", "1px solid #fff ");
            if (!$("input[name*='bp_web']:checked").length) {
                event.preventDefault();
                $("#bp-tab-border").css("border", "1px solid #D13E3E ");
            }
        }
        if ($("input[name*='ptd_facebook']:checked").length) {
            $("#ptd-facebook-tab").css("border", "1px solid #fff");
            $("#ptd-tab-border").css("border", "1px solid #fff ");
            if (!$("input[name*='ptd_web']:checked").length) {
                event.preventDefault();
                $("#ptd-tab-border").css("border", "1px solid #D13E3E ");
            }
        }
    }
    //location.href = (active_tab == 'bangkokpost' ? "#bangkokpost" : "#posttoday" );
}

//create a new input field for posting a customer and advertiser name before user clicked a submit button
function createHiddenField() {
    //event.preventDefault();
    for (i = 0; i < 2; i++) {
        switch (i) {
            case 0: //for customer name
                var selIndex = document.form.customer_id.selectedIndex;
                var selText = document.form.customer_id.options[selIndex].text;
                var input_name = 'customer_name';
                break;
            case 1: //for advertiser name
                var selIndex = document.form.advertiser_id.selectedIndex;
                var selText = document.form.advertiser_id.options[selIndex].text;
                var input_name = 'advertiser_name';
                break;
        }
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", input_name);
        input.setAttribute("value", selText);
        //append to form element that you want .
        document.getElementById("form").appendChild(input);
    }
    $('form').append("<input type='hidden' name='total_bp_web' value='" + $("input[name*='bp_web']").length + "' />");
    $('form').append("<input type='hidden' name='total_ptd_web' value='" + $("input[name*='ptd_web']").length + "' />");
}

//generate a new ad description box when user click Add more ad button
function addAds(web_name) {
    var count = $("div[id*='" + web_name + "-ad-card']").length;

    if (count == '1' && !$('#' + web_name + '-ad-card').is(':visible')) {
        //$('#' + web_name + '-ad-card').removeAttr('style');
        $('#' + web_name + '-type-container').removeAttr('style');
    } else {
        var Html = $("div[id*='" + web_name + "-ad-card']").eq(0).clone();
        Html.find('input').each(function() { //Replace input name
            this.name = this.name.replace('[0]', '[' + count + ']');
        });
        Html.find('label[for="customFile"]').each(function() { //Replace input name
            this.textContent = "Choose file";
            this.id = this.id.replace('0', count);
        });
        Html.find("input[type='hidden']").each(function() { //Replace input name
            this.id = this.id.replace('0', count);
        });
        Html.find("input[type='file']").each(function() { //Replace input value
            this.value = '';
        });
        Html.find("input[type='text']").each(function() { //Replace input value
            this.value = '';
        });
        Html.find("input[name*='old_bp_banner_file']").each(function() { //Replace input value
            this.value = '';
        });
        Html.find("input[name*='old_bp_quotation_file']").each(function() { //Replace input value
            this.value = '';
        });
        Html.find("input[name*='old_ptd_banner_file']").each(function() { //Replace input value
            this.value = '';
        });
        Html.find("input[name*='old_ptd_quotation_file']").each(function() { //Replace input value
            this.value = '';
        });
        Html.find('select').each(function() { //Replace dropdown name
            this.name = this.name.replace('[0]', '[' + count + ']');
            var id = this.name.split('_id[' + count + ']')[0]; //set hidden input id for posting dropdown text

            var select_name = this.name.substring(
                this.name.lastIndexOf(web_name + "_") + (web_name == 'bp' ? 3 : 4),
                this.name.lastIndexOf("_")
            );
            if (select_name == 'position') {
                this.setAttribute('onchange', 'document.getElementById(\"' + id + '_text' + count + '\").value=this.options[this.selectedIndex].text;changeOptionValue(this);');
            } else {
                this.setAttribute('onchange', 'document.getElementById(\"' + id + '_text' + count + '\").value=this.options[this.selectedIndex].text;');
            }
        });
        Html.find("div[id*='" + web_name + "-ad-title']").each(function() { //Replace box title
            this.textContent = this.textContent.replace('Ad 1 Description:', 'Ad ' + (count + 1) + ' Description:');
        });
        //var newOnChange = '';
        $('#' + web_name + '-ad-description').append(Html);
        count++;
    }
}


function Validate(oForm) {
    var _validFileExtensions = [".jpg", ".jpeg", ".zip", ".gif", ".png", ".rar", ".ai", ".psd", ".xls", ".xlsx", ".csv"];
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, Your files is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
    return true;
}

//Show file name on label tag
function showFileName(tagName) {
    var file_name = $('input[name="' + tagName + '"]').val();
    var fIndex = String(tagName).match(/\d+/)[0];
    var labelId = String(tagName).replace('[' + fIndex + ']', fIndex);
    $('label[id="' + labelId + '"]').text(String(file_name).slice(String(file_name).lastIndexOf('\\') + 1));
}