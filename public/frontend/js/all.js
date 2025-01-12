let spinner = '<div class="spinner-border m-5" role="status">' +
              '</div>';

$(document).ready(function (){
    
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
});


$(document).ready(function (){

    var swiper = new Swiper(".homeslider", {
        autoplay: {
            delay: 2500, 
            disableOnInteraction: false, 
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});



// register ajax
$(document).ready(function (){
  $("#register_form").on("submit",function (e){
    e.preventDefault(); 
//    var data= $(this).serialize(); 
var formData = new FormData(this);
//    console.log(data);
   $.ajax({
    url: "/auth/user-register",  
    type: "POST",                         
    data: formData,                           
    contentType: false, // Important: Don't set the content type manually
    processData: false,      
    success: function(response) {   
      
        if(response.status==true){
            window.location.href = '/dashboard'; 
        }    
    },
     error: function(xhr) {
        if (xhr.status === 422) {
              let errors = xhr.responseJSON.errors;
      
              $.each(errors, function(key, value) {
              
                $('#' + key + '-error').text(value[0]); 
                $('#' + key + '-error').show(); 
                hs_hidealert(); 

            });
        } else {
            console.error('Error:', xhr);
            alert('An error occurred. Please try again.');
        }
    }

});


  })

})

// hide custom alert

function hs_hidealert(){
   
    setTimeout(function() {
        $(".alert").fadeOut();
    }, 5000);

}



/*
*Login register 
*/
$(document).ready(function (){
 
    $("#login_form").submit(function (e){
        e.preventDefault(); 
        var login_details=new FormData(this);
        $.ajax({
            url: "/auth/user-login",  
            type: "POST",                         
            data: login_details,                           
            contentType: false, // Important: Don't set the content type manually
            processData: false,      
            success: function(response) {   
              
                if(response.status==true){
                    window.location.href = '/dashboard'; 
                }else{
                    alert(response.message)
                }
            },
             error: function(xhr) {
                if (xhr.status === 422) {
                      let errors = xhr.responseJSON.errors;
              
                      $.each(errors, function(key, value) {
                      
                        $('#' + key + '-error').text(value[0]); 
                        $('#' + key + '-error').show(); 
                        hs_hidealert(); 
        
                    });
                } else {
                    console.error('Error:', xhr);
                    alert('An error occurred. Please try again.');
                }
            }
        
        });
        

    });


});
// remove the class when screen size


$(document).ready(function() {
    function checkScreenSize() {
        if (window.matchMedia("(max-width: 991px)").matches) {
            $('.change_header ').removeClass('hs_navbar_part');
        } else  {
            $('.change_header').addClass('hs_navbar_part'); // Optional
        }
        
    }

    // Run on page load
    checkScreenSize();

    // Run when the window is resized
    $(window).resize(function() {
        checkScreenSize();
    });
});

// forgot password
jQuery(document).ready(function (){

    
    jQuery("#forgot_password_form").submit(function (e) {
    
        $(".hs_processer").html(spinner);
         $(".hs_content").hide(); 
        $(".hs_forgotbutton").show(); 
        $(".forgot_button").hide(); 
          e.preventDefault(); 
        //   var formData = jQuery(this).serialize();
          var formData = new FormData(this);

         

        
        //   console.log(formData);
         
            $.ajax({
                        url: "/auth/user-forgot",  
                        type: "POST",                         
                        data: formData,                           
                        contentType: false, // Important: Don't set the content type manually
                        processData: false,      
                        success: function(response) {   
                            alert('sorry');
                                if(response.status==true){
                                    alert("heelo this is testing");
                                    // console.log('heelo this is testing');
                                    // $(".forgot_password_status").removeClass('alert-danger')
                                    // $(".forgot_password_status").addClass('alert-success');
                                    // $(".forgot_password_status").show(); 
                                    // $(".hs_forgotbutton").html("Email send successfull")
                                    //  $(".forgot_password_status").html(response.message);
                                    // $(".hs_content").show(); 
                                    // $(".hs_processer").hide();
                                    // hs_hidealert(); 
                                    // window.location.href = response.reset; 
                                    
                                }else{
                               
                                    $(".forgot_password_status").addClass('alert-success');
                                    $(".forgot_password_status").addClass('alert-danger')
                                    $(".hs_forgotbutton").hide();
                                    $(".forgot_password_status").show(); 
                                    $(".forgot_button").show(); 
                                    $(".forgot_password_status").html(response.message);
                                    $(".hs_content").show(); 
                                    $(".hs_processer").hide();
                                    hs_hidealert(); 
                                }
                                   
                               }
                    });
                });
  });

 