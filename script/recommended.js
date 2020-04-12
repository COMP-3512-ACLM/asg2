let movies = JSON.parse(localStorage.getItem("movies"));
sortMoviesByRating();
let recommendList = [];

function recommendMoviesWithFav(title){
    const search = new RegExp(title, 'i');
    for (let i of movies){
        if(i.id == title){
            fav = i;
        }
    }
    const favRating = fav.vote_average;
    const favYear = fav.release_date.substring(0,4);
    minRating = favRating - 0.25;
    maxRating = favRating + 0.25;
    
    for (let movie of movies){
        currentMovieYear = movie.release_date.substring(0,4);
        currentMovieRate = movie.vote_average;
        if (currentMovieYear == favYear && movie.id != title){
            if (currentMovieRate >= minRating && currentMovieRate <= maxRating){
                recommendList.push(movie);
            }//end ratin check
        }//end of year check
    }//end of for
    if (recommendList.length < 10){
        addMovies(10-recommendList.length);
    }
    display();
    
}

function recommendMoviesWithoutFav(){
    for (let i = 0; i < 10; i++){
        movieToAdd = movies[i];
        recommendList.push(movieToAdd);
    }
    display();
}

function sortMoviesByRating(){
    movies.sort( (a,b) => {return a.vote_average> b.vote_average ? -1 : 1});
}

function addMovies(moviesLeft){
    for (let i = 0; i < moviesLeft; i++){
        movieToAdd = movies[i];
        while(recommendList.includes(movieToAdd)){
            let nextIndex = i + 1;
            movieToAdd = movies[nextIndex];
        }
        recommendList.push(movieToAdd);
    }
}

function display(){
    
    const rList =  document.querySelector("#recommend");
    for (let i of recommendList){
        //alert(i.poster_path);
        rList.innerHTML += '<a href="single-movie.php?id=' + i.id + '"><img src="https://image.tmdb.org/t/p/w92' + i.poster_path + '"></a>';
        //rList.innerHTML += "FFFFF";
        
    }
}