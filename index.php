<!DOCTYPE html>
<html>
    <head>
        <title>PHP infinite scroll pagination</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <style type="text/css">
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background-color: #fff;
            }
        
            .loading {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                font: 14px arial;
            }
        </style>
    </head>
        
    <body>        
        <!-- this loader will fadeout if page loaded for first time  -->
        <div class="preloader">
            <div class="loading">
                <div class="spinner-border" role="status">
                    <!-- <span class="visually-hidden">Loading...</span> -->
                    <span class="visually-hidden"></span>
                </div>
            </div>
        </div>
        <div class="container">
            <h3 class="alert alert-success text-center">
                PHP TUTORIAL INFINITE SCROLLING
            </h3>
            <!-- <h2 class="text-center">PHP infinite scroll pagination</h2> -->
            <br />
            <div class="col-md-12" id="post-data">
            <?php
                require('db_config.php');
                $sql = "SELECT * FROM post
                ORDER BY id_post DESC LIMIT 8"; 
                $result = $mysqli->query($sql);
            ?>
            <?php include('data.php'); ?>
            </div>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        
        <script>
            //when file loaded for first time, fadeout this loader
            $(window).load(function () {
                $(".preloader").fadeOut("slow");
            });
        </script>
        
        <script type="text/javascript">
            //when page scrolled to end of page
            //call function loadMoreData
            $(window).scroll(function () {
                console.log($(document).height());
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                        var first_id = $(".post-id:first").attr('id');
                        var last_id = $(".post-id:last").attr("id");
                        loadMoreData(first_id,last_id);
                    }
                });
        
                //loadMoreData is function to load data from database with ajax method
                //loadMoreData will call when page scrolled to end of the page
                function loadMoreData(first_id,last_id) {
                    $.ajax({
                            url: 'loadMoreData.php',
                            type: "post",
                            data:{
                                first_id:first_id,
                                last_id : last_id
                            },
                            beforeSend: function () {
                                $(".preloader").show();
                            }
                        })
                        .done(function (data) {
                            //show data
                            $("#post-data").append(data);
                            $(".preloader").fadeOut("slow");
                        })
                        .fail(function (jqXHR, ajaxOptions, thrownError) {
                            alert('server not responding...');
                        });
                }
        </script>    
    </body>
</html>