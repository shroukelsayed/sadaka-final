$(document).ready(function(){  

      $("#enddate").change(function () {
          var startDate = document.getElementById("startdate").value;
          var endDate = document.getElementById("enddate").value;
          if ((Date.parse(startDate) >= Date.parse(endDate))) {
              alert("End date should be greater than Start date");
              document.getElementById("enddate").value = "";
          }
      });

      //---------- vaild title Compaign-----------
      $('#title').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
        }
    });

      //---------- vaild Location Compaign-----------  
      $('#location').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
        }
    });

      //---------- vaild budget Compaign-----------
     $('#budget').blur(function() {
        $('span.error-keyup-1').hide();
        var inputVal = $(this).val();
        var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
        if(!numericReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-1">Numeric characters only.</span>');
            $(this).focus();
        }
    });

     //---------- vaild description Compaign-----------
    $('#description').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
        }
    });

    //---------- vaild Name Blood-----------
    $('#name-field').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^[a-zA-Z\s]*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
          
        }
    });

    //---------- vaild Address case and Hospital Blood-----------
    $('#address-field').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
        }
    });

    //---------- vaild Phone blood-----------
    // $('.keyup-phone').keyup(function() {
    //     $('span.error-keyup-4').remove();
    //     var inputVal = $(this).val();
    //     var characterReg = /^[2-9]\d{2}-\d{3}-\d{4}$/;
    //     if(!characterReg.test(inputVal)) {
    //         $(this).after('<span class="error error-keyup-4">Format xxx-xxx-xxxx</span>');
    //     }
    // });


    //---------- vaild Amount blood-----------    
    $('#amount-field').blur(function() {
        $('span.error-keyup-1').hide();
        var inputVal = $(this).val();
        var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
        if(!numericReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-1">Numeric characters only.</span>');
            $(this).focus();
        }
    });
    
    //---------- vaild hospital Name blood----------- 
    $('#hospital-field').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^\s*[a-zA-Z,\s]+\s*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
        }
    });

    //---------- vaild description Others-----------
    $('#description-field').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
        }
    });



    //---------- vaild Name medicin-----------   
    $('#name-medicin').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^[a-zA-Z\s]*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
          
        }
    });

    //---------- vaild Address Hospital-----------   
    $('#address-hos').blur(function() {
        $('span.error-keyup-2').remove();
        var inputVal = $(this).val();
        var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
        if(!characterReg.test(inputVal)) {
            $(this).after('<span class="error error-keyup-2">No special characters allowed.</span>');
            $(this).focus();
        }
    });
   
}); 
