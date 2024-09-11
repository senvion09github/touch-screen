if ( $.isFunction($.validator) ) {

    $.validator.addMethod('filesize', function (value, element, param) {
        if (element.files[0] !== undefined){
            console.log(element.files[0].size);
            const fsize = element.files[0].size; 
            const fileSize = Math.round((fsize / 1024)); 
            const sizeMB = param*1024;
            return this.optional(element) || (fileSize <= sizeMB)
        }else{
            return true;
        }
        
    }, 'File size must be less than {0} MB');

    $.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[A-Za-z\s]+$/i.test(value);
    }, "Please enter only alphabets"); 

    $.validator.addMethod('mobile', function (value, element, param) {
        return this.optional(element) || /^[0-9]{10}$/.test(value);
    }, 'Please enter a valid mobile number.');

    $.validator.addMethod('mobile_up_to_10', function (value, element, param) {
      return this.optional(element) || /^\d{0,10}$/.test(value);
    }, 'Please enter a valid mobile number (up to 10 digits).');

    $.validator.addMethod('mobile_8_to_12', function (value, element, param) {
      return this.optional(element) || /^\d{8,12}$/.test(value);
    }, 'Please enter a valid mobile number (8 to 12 digits).');

    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only letters are allowed");

    $.validator.addMethod('validateEmail', function (value, element, param) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);

        return this.optional(element) || pattern.test(value);       
    }, ' Please enter a valid email address.');

}

function showLoader(){
    // $('.form_spinner').show();
}
function hideLoader(){
    // $('.form_spinner').hide();
}

hideLoader();

$('#brochure_downloadfrm').validate({
    ignore: [],
    // debug: true,
    rules: {
        name: {required: true,lettersonly:true,maxlength: 100},
        mobile: {required: true, mobile: true},
        email: {required: true, validateEmail: true},
        company_name: {required: true},
    },
    messages: {
        // agree: {
        //     required: "Please agree to terms and conditions",
        // }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback'); // Add 'invalid-feedback' class for styling
      error.css('color', 'red'); // Set text color to red
      element.closest('.form-group').append(error);
    },  
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    },

    submitHandler: function(form) {
       var formData = new FormData(form);

        $button = $("#brochure_downloadfrm-submit");
        $button.text('Processing...');

        $('.brochure_downloadfrm-response').html('');
        $button.attr('disabled',true);

        grecaptcha.ready(function() {
          grecaptcha.execute('6LfrpRYqAAAAAFboLVF_GR6QM2qEZJn_hykGUZcV', {action: 'submit'}).then(function(token) {

            formData.append('token', token);

                $.ajax({
                  type: 'post',
                    url: $(form).attr('action'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        res= JSON.parse(response);
                        console.log(res);
                        if(res.status == 1){
                            $('form input, form textarea, form select').val('');
                            $('.brochure_downloadfrm-response').html('<span class="success">'+res.message+'</span>');
                            $.fancybox.close();
                            $("#lnk_download_brochure")[0].click();
                            //window.location.replace("https://www.vihangahead.com/campaign-2024/thank_you.php");
                        }
                        else{
                            $('.brochure_downloadfrm-response').html('<span class="error">'+res.message+'</span>');
                        }
                        $button.attr('disabled',false);
                        $button.text('Submit');
                        // grecaptcha.reset();
                    },
                    error: function(error, textStatus, errorMessage) {
                        console.log(error);
                        // grecaptcha.reset();
                        alert('Request could not be completed');
                        $button.attr('disabled',false);
                        $button.text('Submit');
                    }             
               });
         }); //end grecaptcha execute 
        }); //end grecaptcha 
    }

});