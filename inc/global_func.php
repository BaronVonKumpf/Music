<?php

function redirect($url){
    if (headers_sent()){
      die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
    }else{
      header('Location: ' . $url);
      die();
    }    
}

?>

<script type="text/javascript">
    $(document).ready(function () {

        (function ($) {

            $('#filter').keyup(function () {

                var rex = new RegExp($(this).val(), 'i');
				
                $('.searchable tr').hide();
                $('.searchable tr').filter(function () {
                    return rex.test($(this).text());				
                }).show();

            })

        }(jQuery));

    });
</script>
