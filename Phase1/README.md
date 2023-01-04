Problem Statement:

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;When trying to find something to watch no one wants to spend 20 mins searching
through 5 different websites each with contradicting ratings and information. At that point who
wants to even watch anything anymore? The objective of this project is to put all that
information into a single database so that users can easily find the movies that they want to
watch. We want users to be able to search through many different categories such as; genre,
actors/actresses, awards, directors, ratings, movie titles in alphabetical order, independent
movies, editors, producers, or even by other users’ reviews. As well as simplify existing sites
like IMDB and Rotten Tomatoes by having all the information in one place. We will have the
ratings from IMDB and Rotten Tomatoes, as well as an audience score made by users side by
side so that users can easily see the multiple ratings and decide if the movie is worth watching.
This way users can search for their favorite actors/actresses and easily be able to see the
actor/actresses’ top movies and not waste time looking through all of their movies. To do this we
will implement a text box in the database that will allow users to input what they will be
searching for, and we will implement a search button so that when the users press it, it will
search the database. In other words, we will implement a search bar. We will also use existing
websites such as IMDB and Rotten Tomatoes as a reference for this project as they are the most
well-known movie databases currently out there.

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Movies will consist of a unique movie ID, movie title, image, duration, and synopsis.
Rating will consist of rating ID, IMDB, Rotten Tomatoes, Metacritic, and audience. Genre will
consist of genre ID and genre title. Actor/Actress will include person ID, first name, last name,
and age. Awards will include award ID, academy awards, and golden globe awards. Directors
will consist of director ID, first name, last name, age, and net worth. We will also implement
accounts so users can make their accounts and leave reviews. It will consist of a user ID,
password, date created, email, and phone number.

Queries:
1. Find the title of all movies directed by George Lucas
2. Find all years that have a movie that received an IMDB rating of 8 or above
3. Find all movies with a duration above 90 mins
4. Find the title of all movies in the horror genre
5. Find the title of all movies that have no rotten tomatoes rating.
6. Find all the actor/actress’s names that have a net worth above 100 million
7. Find all actors that played in a movie that won Best Screenplay
8. Find all movie titles that have a sequel
9. Find all accounts created in March 2022
10. All movies that have a PG rating
11. All movies that have a pg-13 rating and are of the horror genre
12. Actors/Actresses that have been in over 20 movies
13. Movies that have a rating of 8 or above in the action genre
14. All movie titles that start with the letter M and end with C
15. Find the ratings of all movies in the mystery genre in increasing order of ratings
16. Find all movie titles favorited by username MovieLover55
17. Find all movie titles that have a rating both from rotten tomatoes and IMDB
18. Find all movies that reviewer Bob Joe has left a review on
19. Find all movies that have the word ‘cat’ in the synopsis
20. Find all movies that support closed captioning


Relational Schema:

    Movies(movie_ID[pk], movie_title, movie_image, duration, rating, synopsis)

    Rating(rating_ID[pk], IMDB, Rotten_tomatoes, Metacritic, audience)

    Genre(genre_ID[pk], genre title)

    Actor/Actresses(person_ID[pk], first name, last name, age, net worth)

    Director(director_ID[pk], first name, last name, age)

    Accounts(user_ID[pk], date_created, password, phone number, email)

    Awards(award_ID[pk], academy_award, golden_globe)
    
Types

    Movies Types:

        Movie ID: int

        Movie Title: string

        Movie Image: blob

        Duration: int

        Rating: string

        Synopsis: string

    Rating Types:

        Rating ID: int

        IMDB: string

        Rotten Tomatoes: int

        Metacritic: int

        Audience: int

    Genre Types:

        Genre ID: int

        Genre Title: string

    Actor/Actresses Types:

        Person ID: int

        First Name: string

        Last Name: string

        Age: int

        Net Worth: string

    Director types:

        Director ID: int

        First Name: string

        Lats Name: string

        Age: int

    Account types:

        User ID: string

        Date Created: string

        Password: string

        Phone number: string

        Email: string

    Awards types:

        Academy Award: string

        Golden Globe: string

Functional Dependencies:

    Movies:

        Movie_ID -> movie_title, movie_image, duration, rating, synopsis

    Rating:

        Rating ID -> IMDB, Rotten Tomatoes, Metacritic, Audience

    Genre:

        Genre_ID -> genre_title

    Actor/Actresses:

        Person_ID -> first_name, last_name, age, net worth

    Director:

        Director_id -> first_name, last_name, age

    Accounts:

        User_id -> date created, password, phone number, email

    Awards:

        Award_ID -> academy_award, golden_globe

BCNF

    Movie BCNF:

        Movie(movie_ID[pk], movie_title, movie_image, duration, rating, synopsis)

        movie_ID is the prime key and everything else can be found by the key movie_ID and as such
        Movies is already in BCNF grammar.

    Rating BCNF:

        Rating(rating_ID[pk], IMDB, Rotten_tomatoes, Metacritic, audience)

        rating_ID is the prime key and everything else can be found by the key rating_ID and as such
        Rating is already in BCNF grammar.

    Genre BCNF:

        Genre(genre_ID[pk], genre title)

        genre_ID is the prime key and everything else can be found by the key genre_ID, and as such
        Genre is already in BCNF grammar.

    Actor/Actresses BCNF:

        Actor/Actresses(person_ID[pk], first name, last name, age, net worth)

        person_ID is the prime key and everything else can be found by the key person_ID, and as such
        Actor/Actresses is already in BCNF grammar.

    Director BCNF:

        Director(director_ID[pk], first name, last name, age)

        director_ID is the prime key and everything else can be found by the key director_ID, and as
        such Director is already in BCNF grammar.

    Account BCNF:

        Account(user_ID[pk], date_created, password, phone number, email)

        user_ID is the prime key and everything else can be found by the key user_ID, and as such
        Account is already in BCNF grammar.

    Award BCNF:

        Award(award_ID[pk], academy_award, golden_globe)

        award_ID is the prime key and everything else can be found by the key award_ID, and as such
        Award is already in BCNF grammar.
