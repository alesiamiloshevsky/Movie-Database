<?php include 'inc-dbconn.php' ?>
<?php $query = "
select 
    Movies.movie_ID,
    movie_title, 
    award_name 
from 
    Movies, 
    Awards, 
    movieAwards 
where 
    movieAwards.movie_ID = Movies.movie_ID
    and movieAwards.award_ID = Awards.award_ID;
order by 
    Movies.movie_ID;
"?>
<?php include 'inc-show-table.php' ?>