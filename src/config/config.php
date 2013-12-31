<?php
/**
 * rok/dox configuration file
 *
 * @author rok <rok@ipunkt.biz>
 * @since 31.12.13
 */

return array(

	/**
	 * Documentation title
	 *
	 * Main page title on site and in browser title
	 *
	 * Default value: "Documentation"
	 * @var string title
	 */
	'title' => 'Documentation',

	/**
	 * Documentation path
	 *
	 * This path is used to access the documentation source files relative to the project's root folder.
	 *
	 * Default value: "/docs"
	 * @var string path - relative path, starting at the same level of app_path()
	 */
	'path' => '/docs',

	/**
	 * Documentation index
	 *
	 * This is the source file which contains the index dictionary, it will also be displayed as sidebar.
	 * Omit file extension ".md"
	 *
	 * Default value: "toc"
	 * @var string index
	 */
	'index' => 'toc',

	/**
	 * Home page or start page of the documentation, when no file/uri given.
	 *
	 * Default value: 'index'
	 * @var string home
	 */
	'home' => 'index',

	/**
	 * Base uri under which the documentation files will be accessed via http/browser. Files will be appended
	 *
	 * Default value: "/docs/"
	 * @var string uri
	 */
	'uri' => '/docs/',

	/**
	 * Use the markdown extra parser?
	 *
	 * Default value: true
	 * @var bool extra_parser
	 */
	'extra_parser' => true,

	/**
	 * The documentation view template used for rendering the document
	 *
	 * Default value: "dox::document"
	 * @var string view
	 */
	'view' => 'dox::document',
);