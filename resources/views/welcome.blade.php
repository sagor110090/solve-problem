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

</head>

<body>
    <div class="container" style="margin-top: 50px;">
        <div class="list-item">
            <label>Type a search</label>
            <input type="text" id="search" name="search" placeholder="Enter search name" class="form-control" autocomplete="off">
            <div id="search_list"  class="" style="position: absolute;z-index: 10;overflow-y: scroll; width: 300px; max-height: 300px;">
            </div>
        </div>
        <input type="text" id="email" class="form-control" style="margin-top: 10px;">

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    
    <?php
    
            $myArr = array("name", "email");

            $myJSON = json_encode($myArr);

            // echo $myJSON;

            $decodejson = json_decode($myJSON, true);
            // dd($decodejson);
    ?>
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
                                    $('#search_list').append('<div class="list-group bg-white w-full rounded-t-none shadow-lg" ><a href="#" id="searchItem_'+i+'" class="dropdown-item" >'+value.name+'</a></div>'
                                    );
                                    $('#search').val(value.name);   
                                    $('#email').val(value.email);
                                    $(document).on('click', '#searchItem_'+i+'', function(){
                                        
                                        var name = $(this).text();
                                        // $('#email').val();                                           
                                            console.log(name);
                                            // console.log(value.name);
                                            var json =[];
                                            var json = <?php echo json_encode($decodejson)?>;
                                            console.log(json);
                                            if (name==value.name) {
                                                for (let i = 0; i < json.length; i++) {
                                                    const element = json[i];
                                                    $('#email').val(value.element);
                                                }
                                                   
                                                // $('#email').val(value.email);
                                            }
                                            
                                         
                                        $('#search_list').html("");
                                    });

                                });
                                // $(document).on('click', '#searchItem_', function(){
                                //     var name = $(this).text();
                                //     $('#email').val();   
                                //     $.each(data, function (i, value) { 
                                //         console.log(name);
                                //         console.log(value.name);
                                //         if (value==value.name) {
                                //             $('#search').val(value.name);   
                                //             $('#email').val(value.email);
                                //         }
                                           
                                //     });
                                //     $('#search_list').html("");
                                // });
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
    {{-- <script>
        $(document).ready(function () {
                $('#search').on('keyup',function() {
                    var query = $(this).val();
                    if (query.length>=2 ) {
                    $.get( "/search/"+query, function(data) {
                               $('#search_list').fadeIn();
                                $('.dropdown-item').remove();
                                $.each(data, function (i, value) { 
                                    $('#search_list').append('<div class="list-group bg-white w-full rounded-t-none shadow-lg"><a href="#" class="dropdown-item" >'+value.name+'</a></div>'
                                    );
                                $(document).on('click', 'a', function(){
                                    var value = $(this).text();
                                    $('#email').val();   
                                    $.each(data, function (i, value) { 
                                        $('#search').val(value.name);   
                                        $('#email').val(value.email);   
                                    });
                                    $('#search_list').html("");
                                });
                            });
                        }, "json" );
                    }
                    
        });

              
              $(document).on('click', 'html', function(){
                    $('#search').val();
                    $('#search_list').html("");
                });
             });
            
    </script> --}}
    <script>
    
    </script>
</body>

</html>
