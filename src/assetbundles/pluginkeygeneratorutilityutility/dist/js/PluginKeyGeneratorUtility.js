/**
 * Plugin Key Generator plugin for Craft CMS
 *
 * PluginKeyGeneratorUtility Utility JS
 *
 * @author    Brilliance
 * @copyright Copyright (c) 2022 Brilliance
 * @link      https://www.brilliancenw.com/
 * @package   PluginKeyGenerator
 * @since     3.0.0
 */
jQuery( document ).ready(function() {
    $('#pluginkeygeneratorform').on('submit', function(event) {
        event.preventDefault();

        // check for missing data in fields
        var errors = [];
        $(".required-field").map(function(){
            if( !$(this).val() ) {
                var fieldId = "#"+$(this).attr("id")+'-label';
                var labelText = " - "+$(fieldId).text()+" is required";
                errors.push(labelText);
            }
        });
        if(errors.length > 0){
            var errorText = errors.join("\n");
            alert("Please correct the following errors: \n"+errorText);
            return false;
        }
        else {
            $('#fetchingcontent').show();
            $('#licenseform').hide();
            // all good, now take the info and send it on to the controller
            var form = $(this);
            var actionUrl = form.attr('action');

            // receive the response
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(responseData, textStatus, jqXHR)
                {

                    console.log(responseData);
                    /*
                    {
                       "license":{
                          + "pluginHandle":"algolia-sync",
                          + "edition":"standard",
                          + "trial":false,
                          + "expirable":false,
                          "renewalPrice":null,
                          + "email":"mark@markmiddleton.com",
                          + "key":"Q0JX4P6QMOQQ0G6N45O1C5NR",
                          + "notes":"",
                          + "expiresOn":null,
                       }
                    }
                     */

                    // display the results
                    $('#license-key-value').val(responseData.license.key);
                    $('#license-email').html(responseData.license.email);
                    $('#license-pluginHandle').html(responseData.license.pluginHandle);
                    $('#license-edition').html(responseData.license.edition);
                    if (responseData.license.trial) {
                        $('#license-trial').html("Trial Version");
                    }
                    else {
                        $('#license-trial').html("Not a Trial");
                    }
                    if (responseData.license.expirable) {
                        var dateString = responseData.license.expiresOn;
                        var thisdate = new Date(dateString.replace('T', ' ').split('+')[0]);
                        $('#license-expirable').html("Expires "+thisdate.toLocaleDateString());
                    }
                    else {
                        $('#license-expirable').html("Never Expires");
                    }
                    if (responseData.license.notes !== "") {
                        $('#license-notes').html(responseData.license.notes);
                    }
                    else {
                        $('#license-notes').html("(none)");
                    }
                    $('#fetchingcontent').hide();
                    $('#licensedetails').show();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                    $('#fetchingcontent').hide();
                    $('#licenseform').show();
                }
            });
        }
    })

    $('#pagereset').on('click', function(event) {
        event.preventDefault();
        $('#licensedetails').hide();
        $('#fetchingcontent').hide();
        $('#licenseform').show();
    });
});
