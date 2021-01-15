<?php

use TorMorten\View\Controller;

class BooksController extends TorMorten\View\Controller {

	protected $views = ['books', 'library'];

	public function process() {
		$books = get_posts('post_type=post');
		return compact('books');
	}

}