<form class='blog-search' action="/blog/" method="get">
	<div class="dot-input"></div>
	<input type="text" name="s" id="search" class="label check-field" value="<?php echo get_search_query() == "" ? "Search..." : get_search_query(); ?>" title="Search..." />
	<input type="submit" alt="Search" value='' class='submit' />
</form>