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
            <label>Type a search</label>
            <input type="text" id="search" placeholder="Enter search name" class="form-control">
            <div id="search_list" class="" style="position: absolute;z-index: 10;">
            </div>
        </div>
        <input type="text" id="email" class="form-control" style="margin-top: 10px;">

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
                $('#search').on('keyup',function() {
                    var query = $(this).val();
                    if (query.length>=2 ) {
                        $.ajax({
                        type: "GET",
                        url: "/search/"+query,
                        data:{query},
                        success:function (data) {
                            $('#search_list').fadeIn();
                                $('.dropdown-item').remove();
                                $.each(data, function (i, value) { 
                                    $('#search_list').append('<div class="list-group bg-white w-full rounded-t-none shadow-lg" ><a href="#" class="dropdown-item" >'+value.name+'</a></div>'
                                    );
                                });
                                $(document).on('click', 'a', function(){
                                    var value = $(this).text();
                                    $('#email').val();   
                                    $.each(data, function (i, value) { 
                                        $('#search').val(value.name);   
                                        $('#email').val(value.email);   
                                    });
                                    $('#search_list').html("");
                            });
                                    }
                        });
                    }
                    
            });

              
              $(document).on('click', 'html', function(){
                    $('#search').val();
                    $('#search_list').html("");
                });
            });
            
    </script>
</body>

</html>