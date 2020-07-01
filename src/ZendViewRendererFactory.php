<?php

namespace SimpleZendViewWrapper;

use Zend\View\Resolver\TemplatePathStack;
use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;
use SimpleZendViewWrapper\ZendViewRenderer;

/**
 *
 * @author Raphael da Silva / 2016
 *
 */
class ZendViewRendererFactory
{

	public static function create($path, $layout = null, callable $register = null)
	{

		$resolver = new TemplatePathStack([
			'script_paths' => [
				$path
			]
		]);

		$layoutView = null;

		if(!is_null($layout)){
			$layoutView = new ViewModel();
			$layoutView->setTemplate($layout);
		}

		$renderer = new PhpRenderer;
		$renderer->setResolver($resolver);

		if(!is_null($register)){
			$register($renderer, $renderer->getHelperPluginManager());
		}

		return new ZendViewRenderer(
			$renderer,
			$layoutView
		);

	}

}