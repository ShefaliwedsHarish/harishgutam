let spinner = '<div class="spinner-border m-5" role="status">' +
              '</div>';

$(document).ready(function (){
    
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
});

function hs_hidealert(){
   
    setTimeout(function() {
        $(".alert").fadeOut();
    }, 5000);

}

/**** Code for service ********/
$(document).ready(function () {

    // Code for service
    $("#service_submit").on("submit", function (e) {
        e.preventDefault(); 
        var form = new FormData(this); 

        $.ajax({
            url: '/admin/save_service_submit', 
            type: 'POST', 
            data: form,
            processData: false, 
            contentType: false, 
          
            success: function (response) {
                console.log("Success:", response);
                // Add your success handling logic here
                alert("Service submitted successfully!");
            },error: function(xhr) {
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
