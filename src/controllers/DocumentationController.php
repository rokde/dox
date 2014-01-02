<?php namespace Rokde\Dox;
/**
 * mitarbeiterbereich2
 *
 * @author rok
 * @since 31.12.13
 */

use App;
use Config;
use File;
use Exception;
use View;
use DOMDocument;
use Illuminate\Routing\Controllers\Controller;
use \dflydev\markdown\MarkdownParser as Markdown;
use \dflydev\markdown\MarkdownExtraParser as ExtraParser;

class DocumentationController extends Controller {

	/**
	 * returns the rendered document with navigation
	 *
	 * @param string|null $file
	 * @return \Illuminate\View\View
	 */
	public function getDocument($file = null)
	{
		//	load requested file
		$document = $this->getFile($file);
		$markdown = $this->getParser();

		$content = '';
		try{
			$content = $markdown->transformMarkdown(File::get($document));
		}
		catch (Exception $e)
		{
			App::abort(404);
		}

		//	load toc-index
		$toc = Config::get('dox::index', 'toc');
		$documentToc = $this->getFile($toc);

		$index = '';
		try{
			$index = $markdown->transformMarkdown(File::get($documentToc));
		}
		catch (Exception $e)
		{
			App::abort(404);
		}

		$navigation = $this->getNavigationLinks($index, $document);

		return View::make(Config::get('dox::view', 'dox::document'), compact('content', 'index', 'navigation'));
	}

	/**
	 * returns the filesystem path to the file requested
	 *
	 * @param string|null $file
	 * @param bool $abort
	 * @return string
	 */
	protected function getFile($file, $abort = true)
	{
		if (null === $file)
		{
			$file = Config::get('dox::home');
		}

		//	adding markdown extension
		$file .= '.md';

		//	get the base path of documentation files
		$basePath = rtrim(base_path() . '/' . Config::get('dox::path'), '/') . '/';

		if (!File::isFile($basePath.$file))
		{
			if ($abort)
			{
				App::abort(404);
			}
			return false;
		}

		return $basePath.$file;
	}

	/**
	 * returns the requested parser
	 *
	 * @param array|null $configuration
	 * @return ExtraParser|Markdown
	 */
	protected function getParser(array $configuration = null)
	{
		if (Config::get('dox::extra_parser'))
		{
			return new ExtraParser($configuration);
		}

		return new Markdown($configuration);
	}

	/**
	 * returns navigation links for previous and next navigation
	 *
	 * @param string $html
	 * @param string $currentDocument
	 * @return array
	 */
	protected function getNavigationLinks($html, $currentDocument)
	{
		$dom = new DOMDocument();
		$dom->loadHTML($html);

		$foundCurrentDocument = false;
		$navigation = array(
			'prev' => false,
			'next' => false,
			'title' => '',
		);

		$basePath = rtrim(base_path() . '/' . Config::get('dox::path'), '/') . '/';

		$domLinks = $dom->getElementsByTagName('a');
		foreach ($domLinks as $domLink)
		{
			$link['uri'] = $domLink->getAttribute('href');
			$link['title'] = $domLink->nodeValue;

			if ($foundCurrentDocument) // on previous loop
			{
				$navigation['next'] = $link;
				break;
			}

			$foundCurrentDocument = ($basePath . ltrim($link['uri'], '/') === $currentDocument);
			if (!$foundCurrentDocument) // on this loop
			{
				$navigation['prev'] = $link;
			}
			else
			{
				//	current documents title
				$navigation['title'] = $link['title'];
			}
		}

		return $navigation;
	}
}
