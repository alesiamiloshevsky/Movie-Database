<?php include 'inc-dbconn.php' ?>
<?php $query = "
select
    Movies.movie_ID,
    movie_title,
    actor_firstname,
    actor_lastname,
    actor_age,
    actor_net_worth
FROM
    Movies,
    Actor,
    movieActor
WHERE
    movieActor.movie_ID = Movies.movie_ID
    and movieActor.actor_ID = Actor.actor_ID
order BY
    Movies.movie_ID;
"?>
<?php include 'inc-show-table.php' ?>