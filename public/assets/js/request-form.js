function showOption(element, web_name) {
    //var web_name = 'bp';
    var id = element.attr('id');
    x = id.substr(id.length - 3).charAt(0);
    y = id.substr(id.length - 1);
    $("#" + web_name + "_type--" + (x == '1' ? '2' : '1') + "-" + y).hide();
    var position_dropdown = $('#' + web_name + '-ad-card--' + y).find('select[name*="' + web_name + '_position_id"]');
    var position_text = $('#' + web_name + '-ad-card--' + y).find('select[name*="' + web_name + '_position_text"]');
    var section_dropdown = $('#' + web_name + '-ad-card--' + y).find('select[name*="' + web_name + '_section_id"]');
    var section_text = $('#' + web_name + '-ad-card--' + y).find('select[name*="' + web_name + '_section_text"]');
    //console.log(position_text)
    if (x == '1' || x == '3') //if user selected 'Social' or 'E-newsletter'
    { //console.log("web name = "+web_name+" x = "+x+" : y = "+y);
        if (x == '1') //if user selected 'Social'
        {
            $("#" + web_name + "_type--2-" + y).hide();
            $("#" + web_name + "_type--2-" + y + " :input").each(function() {
                $(this).prop('required', false);
                $(this).prop('checked', false);
            });
        } else if (x == '3') //if user selected 'E-newsletter'
        {
            $("#" + web_name + "_type--1-" + y).hide();
            $("#" + web_name + "_type--1-" + y + " :input").each(function() {
                $(this).prop('required', false);
                $(this).prop('checked', false);
            });
            $("#" + web_name + "_type--2-" + y).hide();
            $("#" + web_name + "_type--2-" + y + " :input").each(function() {
                $(this).prop('required', false);
                $(this).prop('checked', false);
            });
            for (i = 0; i < 2; i++) //remove required properties for all option
            {
                $("#" + web_name + "_type--" + (i + 1) + "-" + y + " :input").each(function() {
                    $(this).prop('required', false);
                });
            }
        }
        $('#' + web_name + '-ad-card--' + y).find('div[id*="' + web_name + '_device"]').each(function() {
            $(this).hide();
            $(this).find('input').each(function() {
                $(this).prop('required', false);
                $(this).prop('disabled', true);
                $(this).prop('checked', false);
            });
        });

        position_dropdown.each(function() {
            $(this).prop('required', false);
            $(this).prop('disabled', true);
            $(this).prop('selected', false);
        });
        position_text.each(function() {
            $(this).prop('required', false);
            $(this).prop('disabled', true);
            $(this).val() = '';
        });
        section_dropdown.each(function() {
            $(this).prop('required', false);
            $(this).prop('disabled', true);
            $(this).prop('selected', false);
        });
        section_text.each(function() {
            $(this).prop('required', false);
            $(this).prop('disabled', true);
            $(this).val() = '';
        });
    } else if (x == '2') //if user selected 'Website'
    {
        //console.log('it\'s worked');
        $("#" + web_name + "_type--1-" + y).hide();
        $("#" + web_name + "_type--1-" + y + " :input").each(function() {
            $(this).prop('required', false);
            $(this).prop('checked', false);
        });
        $('#' + web_name + '-ad-card--' + y).find('div[id*="' + web_name + '_device"]').each(function() {
            $(this).show();
            $(this).find('input[name*="' + web_name + '_device"]').each(function() {
                $(this).prop('required', true);
                $(this).prop('disabled', false);
                $(this).prop('checked', false);
            })
        });

        position_dropdown.each(function() {
            console.log($(this));
            $(this).prop('required', true);
            $(this).prop('disabled', false);
        });
        position_text.each(function() {
            $(this).prop('required', true);
            $(this).prop('disabled', false);
            $(this).val() = '';
        });
        section_dropdown.each(function() {
            $(this).prop('required', true);
            $(this).prop('disabled', false);
        });
        section_text.each(function() {
            $(this).prop('required', true);
            $(this).prop('disabled', false);
            $(this).val() = '';
        });
    }

    position_dropdown.each(function() {
        $(this).find('option').each(function() {
            $(this).prop('selected', false);
        });
    });
    section_dropdown.each(function() {
        $(this).find('option').each(function() {
            $(this).prop('selected', false);
        });
    });

    $("#" + web_name + "_type--" + x + "-" + y + " :input").each(function() {
        $(this).prop('required', true);
    });
    $("#" + web_name + "_type--" + (x == '1' ? '2' : '1') + "-" + y + " :input").each(function() {
        $(this).prop('required', false);
    });
    $("#" + web_name + "_type--" + x + "-" + y).show();
    $("#" + web_name + "-ad-card--" + y).show();
}


function addAds(web_name) {
    if ($('input[name="' + web_name + '_type[0]"]').is(':checked')) {
        var count = $('div[id*="' + web_name + '_detail--"]').length;
        var Html = $('div[id="' + web_name + '_detail--1"]').eq(0).clone();
        Html.each(function() {
            this.id = this.id.replace('1', (count + 1));
        })
        Html.find('input').each(function() { //Replace input name
            this.name = this.name.replace('[0]', '[' + count + ']');
            if (this.type !== 'radio' && this.type !== 'checkbox') {
                this.value = '';
            }
        });
        Html.find('div[id*="' + web_name + '_device"]').each(function() {
            this.removeAttribute('style');
        });
        Html.find('input[name*="' + web_name + '_device"]').each(function() {
            this.removeAttribute('disabled');
            this.required = true;
        });
        Html.find('label[for="customFile"]').each(function() { //Replace input name
            this.textContent = "Choose file";
            this.id = this.id.replace('0', count);
        });
        Html.find("input[type='hidden']").each(function() { //Replace input name
            this.id = this.id.replace('0', count);
        });
        Html.find("input[type='radio']").each(function() { //Replace input value
            this.checked = false;
        });
        Html.find('input[name*="' + web_name + '_type"]').each(function() {
            this.id = this.id.replace('1-1', '1-' + (count + 1));
            this.id = this.id.replace('2-1', '2-' + (count + 1));
            this.id = this.id.replace('3-1', '3-' + (count + 1));
        });
        Html.find('input[name*="' + web_name + '_web"]').each(function() {
            this.id = this.id.replace('[0][', '[' + (count + 1) + '][');
        });
        Html.find('div[id*="' + web_name + '_type--"]').each(function() {
            this.id = this.id.replace(this.id.substr(this.id.length - 3).charAt(0) + '-' + this.id.substr(this.id.length - 1), this.id.substr(this.id.length - 3).charAt(0) + '-' + (count + 1));
            this.setAttribute('style', 'display:none;');
        });
        Html.find('select').each(function() { //Replace dropdown name
            this.name = this.name.replace('[0]', '[' + count + ']');
            this.removeAttribute('disabled');
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
        Html.find('div[id*="' + web_name + '-ad-card--"]').each(function() { //replace card index
            this.id = this.id.replace('1', (count + 1));
            this.setAttribute('style', 'display:none;');
        });
        $('#' + web_name + '-all-detail').append(Html);
        count++;
    } else {
        $(".alert-type-required-text").text('กรุณาเลือกประเภท (Social/ Website/ E-newsletter)');
        $("#alertModal").modal('show');
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
                    //alert("Sorry, Your files is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    $(".alert-type-required-text").text("Sorry, Your files is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    $("#alertModal").modal('show');
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

function getCheckBoxIndex(checkbox) {
    return String(checkbox.attr('id')).match(/\d+/)[0];
}

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
//Create input field before user click submit button
function beforeSubmit() {
    createHiddenField();
    //validateCheckbox(active_tab,none_active_tab);
    //event.preventDefault();
    var i = 0;
    while (i < 2) {
        if (i == '0') //remove required properties from social option
        {
            $('div[id*="bp_type--1"]').each(function() { //remove required properties from bp social option
                var index = $(this).attr('id').substr($(this).attr('id').length - 1);;
                $(this).find('input').each(function() {
                    //console.log($(this).attr('id'));
                    if ($(this).is(':checked')) {
                        $('div[id*="bp_type--1-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                        $('div[id*="bp_type--2-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                    }
                });
                for (j = 0; j < 3; j++) //remove require properties from bp device option if type = 1 or 3
                {
                    if (j == 0 || j == 2) {
                        if ($('input[id="bp_type' + (j + 1) + '-' + index + '"]').is(':checked')) {
                            $('div[id*="bp-ad-card--' + index + '"]').each(function() {
                                $(this).find('input[name*="bp_device"]').each(function() {
                                    $(this).prop('required', false);
                                });
                                if (j == 2) { //remove all checkbox required when type = E-newsletter
                                    for (k = 0; k < 3; k++) {
                                        $('input[id="bp_type' + (k + 1) + '-' + index + '"]').prop("required", false);
                                    }
                                    $('input[name*="bp_facebook[' + j + ']"]').each(function() {
                                        $(this).prop("required", false);
                                    });
                                    $('input[name*="bp_social[' + j + ']"]').each(function() {
                                        $(this).prop("required", false);
                                    });
                                    $('input[name*="bp_web[' + j + ']"]').each(function() {
                                        $(this).prop("required", false);
                                    });
                                }
                            });

                        }
                    }
                }
            });

            $('div[id*="ptd_type--1"]').each(function() { //remove required properties from ptd social option
                var index = $(this).attr('id').substr($(this).attr('id').length - 1);;
                $(this).find('input').each(function() {
                    if ($(this).is(':checked')) {
                        $('div[id*="ptd_type--1-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                        $('div[id*="ptd_type--2-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                    }
                });
                for (j = 0; j < 3; j++) //remove require properties from bp device option if type = 1 or 3
                {
                    if (j == 0 || j == 2) {
                        if ($('input[id="ptd_type' + (j + 1) + '-' + index + '"]').is(':checked')) {
                            $('div[id*="ptd-ad-card--' + index + '"]').each(function() {
                                $(this).find('input[name*="ptd_device"]').each(function() {
                                    $(this).prop('required', false);
                                });
                            });
                            if (j == 2) { //remove all checkbox required when type = E-newsletter
                                for (k = 0; k < 3; k++) {
                                    $('input[id="ptd_type' + (k + 1) + '-' + index + '"]').prop("required", false);
                                }
                                $('input[name*="ptd_facebook[' + j + ']"]').each(function() {
                                    $(this).prop("required", false);
                                });
                                $('input[name*="ptd_social[' + j + ']"]').each(function() {
                                    $(this).prop("required", false);
                                });
                                $('input[name*="ptd_web[' + j + ']"]').each(function() {
                                    $(this).prop("required", false);
                                });
                            }
                        }
                    }
                }
            });
        } else { //remove required properties from web option
            $('div[id*="bp_type--2"]').each(function() { //remove required properties from bp web option
                var index = $(this).attr('id').substr($(this).attr('id').length - 1);;
                $(this).find('input').each(function() {
                    if ($(this).is(':checked')) {
                        $('div[id*="bp_type--2-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                        $('div[id*="bp_type--1-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                    }
                });
            });

            $('div[id*="ptd_type--2"]').each(function() { //remove required properties from ptd web option
                var index = $(this).attr('id').substr($(this).attr('id').length - 1);;
                $(this).find('input').each(function() {
                    if ($(this).is(':checked')) {
                        $('div[id*="ptd_type--2-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                        $('div[id*="ptd_type--1-' + index + '"] :input').each(function() {
                            $(this).prop("required", false);
                        });
                    }
                });
            });
        }
        i++;
    }

    $('div[class="custom-file"] :input').each(function() {
        if ($(this).val() !== "") {
            $('div[class="custom-file"] :input').each(function() {
                $(this).prop("required", false);
            });
            return false;
        }
    });

    onSubmit = true;
}

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
    $('div[id*="bp_type--2-"]').each(function(index) {
        $('form').append("<input type='hidden' name='total_bp_web[" + index + "]' value='" + $(this).find('input').length + "' />");
    });
    $('div[id*="ptd_type--2-"]').each(function(index) {
        $('form').append("<input type='hidden' name='total_ptd_web[" + index + "]' value='" + $(this).find('input').length + "' />");
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
        if (previous_tab_input[i].type !== "radio" && previous_tab_input[i].type !== "checkbox") {
            previous_tab_input[i].value = '';
        }
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
            active_tab = 'posttoday';
            none_active_tab = 'bangkokpost';
            addTabClass(active_tab, none_active_tab); //add and remove some attribute on this tab
            requireFieldOnCard('ptd', true); //add require attribute to input field
            clearPreviousTab(active_tab); //clear all input value on previous tab
            $('div[id*="bp_detail--"]').each(function(index) { //destroy all cloned card on bangkokpost tab when user changed tab to posttoday
                if (index !== 0) { //if this card not equal default card
                    $(this).remove(); //remove cloned card
                }
            });
            $("div[id*='ptd-ad-card']").hide(); //hide default card
            $("div[id*='ptd_type--1']").hide();
            $("div[id*='ptd_type--2']").hide();
        }
    })
})

//Event when user clicked on bangkokpost tab
$('#bangkokpost-tab').click(function(e) {
    if (active_tab !== 'bangkokpost') {
        //if user change current tab, hide posstoday tab and show bangkokpost tab
        $('.nav-requestForm').removeClass('tabs--ptd');
        active_tab = 'bangkokpost';
        none_active_tab = 'posttoday';
        addTabClass(active_tab, none_active_tab); //add and remove some attribute on this tab
        requireFieldOnCard('bp', true); //add require attribute to input field
        clearPreviousTab(active_tab); //clear all input value on previous tab
        $('div[id*="ptd_detail--"]').each(function(index) { //destroy all cloned card on posttoday tab when user changed tab to bangkokpost
            if (index !== 0) { //if this card not equal default card
                $(this).remove(); //remove cloned card
            }
        });
        $("div[id*='bp-ad-card']").hide(); //hide default card
        $("div[id*='bp_type--1']").hide();
        $("div[id*='bp_type--2']").hide();
    }
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