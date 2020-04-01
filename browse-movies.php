<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="style/reset.css" />
    </head>
    <body>
        <!-- TODO: create header via PHP -->
        <!--Filters-->
        <div>
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
                    <input type="radio" />
                    <label>Before</label>
                    <input type="text" />
                    <!--After-->
                    <input type="radio" />
                    <label>After</label>
                    <input type="text" />
                    <!--Between-->
                    <input type="radio" />
                    <label>Between</label>
                    <input type="text" />
                    <input type="text" />
                </fieldset>
                <!--Rating-->
                <fieldset>
                    <legend>Rating</legend>
                    <!--Below-->
                    <input type="radio" />
                    <label>Below</label>
                    <input name="below" type="range" min="0" max="10" value="5" />
                    <output for="below"></output>
                    <!--Above-->
                    <input type="radio" />
                    <label>Above</label>
                    <input name="above" type="range" min="0" max="10" value="5" />
                    <output for="above"></output>
                    <!--Between-->
                    <input type="radio" />
                    <label>Between</label>
                    <input name="between-lower" type="range" min="0" max="10" value="5" />
                    <output for="between-lower"></output>
                    <input name="between-upper" type="range" min="0" max="10" value="5" />
                    <output for="between-upper"></output>
                </fieldset>
                <button>Filter</button>
                <button>Clear</button>
            </form>
        </div>
        <!--Results-->
        <div>
        </div>
    </body>
</html>