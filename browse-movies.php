<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style/reset.css" />
        <link rel="stylesheet" href="style/style.css" />
        <script src="script/browse.js"></script>
    </head>
    <body>
        <!-- TODO: create header via PHP -->
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
                        <input name="below" type="range" min="0" max="10" value="5" />
                        <output for="below">1</output>
                    </div>
                    <!--Above-->
                    <div>
                        <input name="rating" type="radio" />
                        <label>Above</label>
                        <input name="above" type="range" min="0" max="10" value="5" />
                        <output for="above">3</output>
                    </div>
                    <!--Between-->
                    <div>
                        <input name="rating" type="radio" />
                        <label>Between</label>
                        <input name="between-lower" type="range" min="0" max="10" value="5" />
                        <output for="between-lower">5</output>
                        <input name="between-upper" type="range" min="0" max="10" value="5" />
                        <output for="between-upper">10</output>
                    </div>
                </fieldset>
                <button>Filter</button>
                <button>Clear</button>
            </form>
        </div>
        <!--Results-->
        <div class="container">
            <h1>Search Results</h1>
            <div id="sortbar">
                <h2>Sort by:</h2>
                <span data-sortid="title" data-sortdir="1">Title</span>
                <span data-sortid="rating" data-sortdir="1">Rating</span>
                <span data-sortid="year" data-sortdir="1">Year</span>
            </div>
        </div>
    </body>
</html>