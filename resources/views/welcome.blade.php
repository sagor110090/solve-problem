<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- jQuery UI -->
    {{-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}

</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="list-item">
            <label>Type a country name</label>
            <input type="text" name="country" id="country" placeholder="Enter country name" class="form-control">
            <div id="country_list" class="">
            </div>
        </div>
        <input type="text">

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        // jQuery wait till the page is fullt loaded
         $(document).ready(function () {
                $('#country').on('keyup',function() {
                    var query = $(this).val();

                    $.ajax({
                        type: "GET",
                        url: "/search/"+query,
                        data:{query},
                        success:function (data) {
                            $('#country_list').fadeIn();
                            $('#country_list').html(data);
                        }
                    });
            });

              // initiate a click function on each search result
              $(document).on('click', 'a', function(){
                    var value = $(this).text();
                    $('#country').val(value);
                    $('#country_list').html("");
                });
              $(document).on('click', 'html', function(){
                    // var value = $(this).text();
                    $('#country').val();
                    $('#country_list').html("");
                });
            });
            
    </script>
</body>

</html>