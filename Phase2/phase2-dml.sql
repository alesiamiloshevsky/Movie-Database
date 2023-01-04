-- Select all

select * from users;

select * from admin_users;

select * from Actor;

select * from Awards;

select * from Director;

select * from Genre;

select * from Rating;

select * from Movies;

select * from movieGenre;

select * from movieRating;

select * from movieDirector;

select * from movieActor;

select * from movieAwards;

select * from logger;

-- Select with conditions

select 
    Movies.movie_ID,
    movie_title, 
    genre_title 
from 
    Movies, 
    Genre, 
    movieGenre 
where 
    movieGenre.movie_ID = Movies.movie_ID
    and movieGenre.genre_ID = Genre.genre_ID
order by 
    Movies.movie_ID;


-----------------------------------------------------------------------------------------------------------

select 
    Movies.movie_ID,
    movie_title,
    rating_IMDB,
    rating_Metacritic,
    rating_Rotten_Tomatoes,
    rating_Audience
from 
    Movies,
    Rating,
    movieRating
where
    movieRating.movie_ID = Movies.movie_ID
    and movieRating.rating_ID = Rating.rating_ID
order by 
    Movies.movie_ID;

-----------------------------------------------------------------------------------------------------------

select
    Movies.movie_ID,
    movie_title,
    director_firstname,
    director_lastname,
    director_age
from 
    Movies,
    Director,
    movieDirector
where 
    movieDirector.movie_ID = Movies.movie_ID
    and movieDirector.director_ID = Director.director_ID
order by 
    Movies.movie_ID;

-----------------------------------------------------------------------------------------------------------

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

-- Group BY

select * from admin_users where admin_username = "admin" and admin_password = "password";


select COLUMNS from Movies;

SELECT movie_title FROM Movies WHERE movie_title REGEXP '^[A]';

select movie_title from Movies where duration >= 180;

select * from Awards;

select
    movie_title
from
    Movies,
    movieAwards
where
    movieAwards.award_ID = 12
    and Movies.movie_ID = movieAwards.movie_ID;

select concat(actor_firstname," ", actor_lastname) as Name from Actor where actor_net_worth >= 100 order by Name;

SELECT concat(actor_firstname," ", actor_lastname) as Name from Actor ;

with cte as (
select 
    actor_ID, count(*) as numMovies 
FROM 
    movieActor
GROUP BY actor_ID
HAVING numMovies > 5
) 
SELECT concat(actor_firstname," ", actor_lastname) as Name
from Actor, cte
where Actor.actor_ID = cte.actor_ID
ORDER BY
    Name;

with rating_cte as (
select *
from Rating
where rating_Metacritic is null
),
movie_cte as (
select movie_ID
from movieRating, rating_cte
where movieRating.rating_ID = rating_cte.rating_ID
)
select movie_title 
from Movies, movie_cte 
where Movies.movie_ID = movie_cte.movie_ID;

with genre_cte as (
select genre_ID from Genre where genre_title = "Fantasy"
),
movie_cte as (
    select movie_ID from movieGenre, genre_cte where movieGenre.genre_ID = genre_cte.genre_ID
),
rating_cte as (
select * from Rating, movie_cte where rating_ID = movie_cte.movie_ID
)
select movie_title, rating_IMDB, rating_Rotten_Tomatoes, rating_Metacritic from Movies, rating_cte where Movies.movie_ID = rating_cte.rating_ID order by movie_title;
