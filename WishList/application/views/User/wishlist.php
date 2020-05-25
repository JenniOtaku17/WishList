
<div class=container>
<?php 
if(isset($movielist['id_movie'])){
$a = $movielist['id_movie'];
}
?>
<script type="text/javascript">

var ids= ["<?php echo $a; ?>"] 

ids.forEach(function(elemento,index,arreglo){
$(document).ready( function (){
        $.ajax({
            type: "GET",
            url: "https://api.themoviedb.org/3/movie/"+elemento+"?api_key=94dcae6139c7f599099691ea345952f0&language=en-US",
            dataType: "json",
            success: function(data){
                var row ="<div class='card' style='width:350px'>"+
                "<div class='card-body'>"+
                "<img class='card-img-top' src='http://image.tmdb.org/t/p/w780"+data.poster_path+"' alt='Card image' height='300'>"+
                "<h4 class='card-title'>"+ data.original_title + "</h4>"+
                "<p class='card-text'><i>Relased Date: "+ data.release_date + "</i></p>"+
                "<a href='#' class='btn btn-primary' data-toggle='collapse' data-target='#demo"+data.id+"'>See Overview</a>"+
                " <div id='demo"+data.id+"' class='collapse'>"+data.overview+"</div></div>"+
                "</div>"; 
                $("#cards").append(row);                     


            },
            
        });
 
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