jQuery(document).ready(function ($) {

    //loquesea
    $(".form-steps #myWizard #send_feed_back_btn").on("click", function(e){ 
      
        $.ajax({
            type: 'post', // en senvian los datos por post
            url: frontend_data.ajax_url,
            data: {
                //nonbre de referencia en add_action del ajax.php
                action: 'theme_feedback_form',

                //nombre del campo y su ubicacion dentro del html
                busqueda_web: $('#step1 ul.list-form li input:checked').val(),
                claridad_web: $('#step2 ul.list-form li input:checked').val(), 
                gusta_sitio1: $('#step3 ul.list-check li input:checked').val(),
                gusta_sitio2: $('#step3 textarea').val(),
                nogusta1:     $('#step4 .card ul.list-check li input:checked').val(),
                nogusta2:     $('#step4 .card  textarea').val(),
                opinion_feed: $('#step5 .card textarea').val(),
            },
            error: function (response) {
                console.log(response);
            },
            success: function (response) {
                console.log(response);
            }
        });
    }); 

)};
