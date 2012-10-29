					<form class="search"method="get" action="<?php bloginfo('url'); ?>/">
						<label for="s">Search the site: </label>
						<input type="text" id="s" name="s" class="ss-form-entry ss-q-short search_entry" title="ENTER YOUR SEARCH HERE"value="<?php the_search_query(); ?>">
						<input type="submit" class="ss-q-submit" value="OK!">
					</form>