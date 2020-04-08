<?php

include "includes/helpers.inc.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style/reset.css" />
        <link rel="stylesheet" href="style/style.css" />
        <link rel="stylesheet" href="style/browse.css" />
        <script src="script/header.js"></script>
        <script src="script/browse.js"></script>
    </head>
    <body>
        <?php outputHeader(); ?>
        <main class="browse">
            <!--Filters-->
            <div id="filters" class="container">
                <h1>Movie Filters</h1>
                <form>
                    <!--Title-->
                    <fieldset>
                        <legend>Title</legend>
                        <input type="text" />
                    </fieldset>
                    <!--Year-->
                    <fieldset>
                        <legend>Year</legend>
                        <!--Before-->
                        <div>
                            <input name="year" type="radio" />
                            <label>Before</label>
                            <input type="text" />
                        </div>
                        <!--After-->
                        <div>
                            <input name="year" type="radio" />
                            <label>After</label>
                            <input type="text" />
                        </div>
                        <!--Between-->
                        <div>
                            <input name="year" type="radio" />
                            <label>Between</label>
                            <input type="text" />
                            <input type="text" />
                        </div>
                    </fieldset>
                    <!--Rating-->
                    <fieldset>
                        <legend>Rating</legend>
                        <!--Below-->
                        <div>
                            <input name="rating" type="radio" />
                            <label>Below</label>
                            <input name="below" type="range" min="1" max="10" value="5" />
                            <output for="below">5</output>
                        </div>
                        <!--Above-->
                        <div>
                            <input name="rating" type="radio" />
                            <label>Above</label>
                            <input name="above" type="range" min="1" max="10" value="5" />
                            <output for="above">5</output>
                        </div>
                        <!--Between-->
                        <div>
                            <input name="rating" type="radio" />
                            <label>Between</label>
                            <input name="between-lower" type="range" min="1" max="10" value="5" />
                            <output for="between-lower">5</output>
                            <input name="between-upper" type="range" min="1" max="10" value="5" />
                            <output for="between-upper">5</output>
                        </div>
                    </fieldset>
                    <div>
                        <button>Filter</button>
                        <button>Clear</button>
                    </div>
                </form>
            </div>
            <!--Results-->
            <div id="results-panel" class="container"><!-- This could have a better ID -->
                <button id="hide"></button>
                <h1>Search Results</h1>
                <div id="sortbar">
                    <h2>Sort by:</h2>
                    <span data-sortid="title" data-sortdir="1">Title</span>
                    <span data-sortid="vote_average" data-sortdir="1">Rating</span>
                    <span data-sortid="release_date" data-sortdir="1">Year</span>
                </div>
                <ul id="results">
                    <li>
                        <img src="https://image.tmdb.org/t/p/w92/wOBKAoUJZb5qTsWv5XXvVV2vUzz.jpg" class="clickable">
                        <div>
                            <h2 class="clickable">Movie Title</h2>
                            <span class="rating">
                                8.3
                                <span class="star icon">★</span>
                            </span>
                            <span class="year">1941</span>
                            <p>This is where the overview goes. If it is too long it will overflow with an ellipsis. Here is some more text so it overflows. Blah blah blah. I am an overview. Here is some more text.</p>
                            <button>View</button>
                        </div>
                    </li>
                    <li>
                        <img src="https://image.tmdb.org/t/p/w92/wOBKAoUJZb5qTsWv5XXvVV2vUzz.jpg">
                        <div>
                            <h2>Movie Title</h2>
                            <span class="rating">
                                8.3
                                <span class="star icon">★</span>
                            </span>
                            <span class="year">1941</span>
                            <p>This is where the overview goes. If it is too long it will overflow with an ellipsis. Here is some more text so it overflows. Blah blah blah. I am an overview. Here is some more text.</p>
                            <button>View</button>
                        </div>
                    </li>
                    <li>
                        <img src="https://image.tmdb.org/t/p/w92/wOBKAoUJZb5qTsWv5XXvVV2vUzz.jpg">
                        <div>
                            <h2>Movie Title</h2>
                            <span class="rating">
                                8.3
                                <span class="star icon">★</span>
                            </span>
                            <span class="year">1941</span>
                            <p>This is where the overview goes. If it is too long it will overflow with an ellipsis. Here is some more text so it overflows. Blah blah blah. I am an overview. Here is some more text.</p>
                            <button>View</button>
                        </div>
                    </li>
                    <li>
                        <img src="https://image.tmdb.org/t/p/w92/wOBKAoUJZb5qTsWv5XXvVV2vUzz.jpg">
                        <div>
                            <h2>Movie Title</h2>
                            <span class="rating">
                                8.3
                                <span class="star icon">★</span>
                            </span>
                            <span class="year">1941</span>
                            <p>This is where the overview goes. If it is too long it will overflow with an ellipsis. Here is some more text so it overflows. Blah blah blah. I am an overview. Here is some more text.</p>
                            <button>View</button>
                        </div>
                    </li>
                    <li>
                        <img src="https://image.tmdb.org/t/p/w92/wOBKAoUJZb5qTsWv5XXvVV2vUzz.jpg">
                        <div>
                            <h2>Movie Title</h2>
                            <span class="rating">
                                8.3
                                <span class="star icon">★</span>
                            </span>
                            <span class="year">1941</span>
                            <p>This is where the overview goes. If it is too long it will overflow with an ellipsis. Here is some more text so it overflows. Blah blah blah. I am an overview. Here is some more text.</p>
                            <button>View</button>
                        </div>
                    </li>
                </ul>
            </div>
        </main>
    </body>
</html>