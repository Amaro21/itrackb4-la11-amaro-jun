Q1: Route model binding needs two things to be true. Name both, and say what happens when only one of them is.

Answer: Route model binding needs two things. First, the parameter must have the model type, Movie. Second, the name must be $movie, the same as {movie} in my route. If I only use Movie but name it $record, Laravel gives me an empty movie with no data, so my pages show blank values and no error.

Q2: Your Delete link gave a 404 even though the address was correct. Explain why.

Answer: My Delete link went to /movies/1, which is the right address, but a link can only send GET. In my project, GET at  /movies/1  goes to show(), so instead of a 404 it opened Batman's detail page and nothing was deleted. Only DELETE goes to destroy(), so I changed the link to a form with  @method('DELETE').

Q3: old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?

Answer: If I leave out the second argument, like old('title'), my edit form opens empty because it does not know the movie's values. If I use only $movie->title, then when I submit a wrong edit, the form shows the old movie values again and deletes what I typed. Using both, old('title', $movie->title), keeps what I typed after an error and shows the movie's values the first time.
