const api = "https://salty-oasis-67120.herokuapp.com/api-movies-brief.php";

let searchResults;

document.addEventListener("DOMContentLoaded", function () {
    const filterPanel = document.querySelector("#filters");
    const resultsPanel = document.querySelector("#results-panel");
    
    // Generate initial search results
    let searchString = new URLSearchParams(location.search).get("search");
    if (!searchString) {
        searchString = "";
    }
    search(searchString);
    
    
    //Updates the range outputs
    filterPanel.addEventListener("input", e => {
        if (e.target.nodeName == "INPUT" && e.target.getAttribute("type") == "range") {
            document.querySelector(`output[for="${e.target.name}"]`).textContent = e.target.value;
        }
    });
    
    //Sorting search results
    const sortButtons = document.querySelectorAll("#sortbar span");
    
    document.querySelector("#sortbar").addEventListener("click", e => {
        if (e.target.nodeName == "SPAN") {
            for (let btn of sortButtons) {
                if (btn == e.target) {
                    // Reverse the sort direction if the same button is pressed twice
                    if (btn.classList.contains("selected")) {
                        btn.dataset.sortdir = btn.dataset.sortdir * -1;
                    }
                    
                    btn.classList.add("selected");
                } else {
                    // Unselect all other buttons
                    btn.classList.remove("selected");
                }
            }
        }
    });
    
    // Toggling the filter panel
    document.querySelector("#hide").addEventListener("click", e => {
        filterPanel.classList.toggle("hidden");
        resultsPanel.classList.toggle("open");
    });
    
});

async function search(searchString) {
    try {
        const movies = await fetchMovies();
        
        const regex = new RegExp(searchString, "gi");
        searchResults = movies.filter(movie => movie.title.match(regex));
        
        const list = document.querySelector("#results");
        list.innerHTML = "";
        console.log("searching for " + searchString);
        console.log(searchResults.length);
        
        for (let movie of searchResults) {
            let item = document.createElement("li");
            item.textContent = movie.title;
            
            list.appendChild(item);
            
        }
    } catch (error) {
        console.error(error);
    }
    
    async function fetchMovies() {
        let movies = JSON.parse(localStorage.getItem("movies"));

        // Fetch the data and store it in local storage if nothing was found
        if (!movies) {
            console.log("fetching movies");
            const response = await fetch(api);
            movies = await response.json();
            localStorage.setItem("movies", JSON.stringify(movies));
        } else {
            console.log("movies retrieved");
            console.log(movies.length);
        }

        return movies;
    }
}