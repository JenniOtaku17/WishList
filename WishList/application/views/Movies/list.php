
<div class=container>
    <?php 
        $base_url = load_class('Config')->config['base_url'];
    ?>
<script>

    var url = "<?php echo $base_url; ?>";
        $(document).ready( function (){
        $.ajax({
            type: "GET",
            url: "https://api.themoviedb.org/3/movie/upcoming?api_key=94dcae6139c7f599099691ea345952f0&language=en-US&page=1",
            dataType: "json",

            success: function(data){
                $.each(data.results, function(i, item){
                    console.log(data);
                    var row ="<div class='card' style='width:350px'>"+
                    "<div class='card-body'>"+
                    "<img class='card-img-top' src='http://image.tmdb.org/t/p/w780"+item.poster_path+"' alt='Card image' height='300'>"+
                    "<h4 class='card-title'>"+ item.title + "</h4>"+
                             "<p class='card-text'><i>Relased Date: "+ item.release_date + "</i></p>"+
                             "<a href='"+url+"index.php/movie/add/"+item.id+"' class='btn btn-danger '><span class='glyphicon glyphicon-heart'></span>Add+</a>"+
                             "<a href='#' style='float: right;' class='btn btn-primary' data-toggle='collapse' data-target='#demo"+item.id+"'>See Overview</a>"+
                             " <div id='demo"+item.id+"' class='collapse'>"+item.overview+"</div>"+
                             "</div>"; 
                    $("#cards").append(row);                     
                });
            },
            
        });
    });

</script>
<div class="card-columns">
<div id="cards">


</div>
</div>


</div>
</body>
</html>