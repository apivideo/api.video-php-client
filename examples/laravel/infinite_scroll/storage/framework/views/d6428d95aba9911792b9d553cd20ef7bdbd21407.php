<!DOCTYPE html>
<html lang="en">
<head>
    <title>Post List Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Infinite Holiday Scroll</h2>
            </div>
            <div class="col-md-12" id="post-data">
                <?php echo $__env->make('data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>
<div class="ajax-load text-center" style="display:none">
    <p><img src="<?php echo e(asset('img/loaderImg.gif')); ?>">Load More Post...</p>
</div>
</body>
</html>

<script>
    function loadMoreData(page)
    {
        $.ajax({
            url:'?page=' + page,
            type:'get',
            beforeSend: function()
            {
                $(".ajax-load").show();
            }
        })
            .done(function(data){
                if(data.html == ""){
                    $('.ajax-load').html("No more Posts Found!");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            // Call back function
            .fail(function(jqXHR,ajaxOptions,thrownError){
                alert("Server not responding.....");
            });

    }
    //function for Scroll Event
    var page =1;
    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() >= $(document).height()){
            page++;
            loadMoreData(page);
        }
    });
</script>
<?php /**PATH /Users/erikkainnes/Lara/holiday/resources/views/holidayView.blade.php ENDPATH**/ ?>