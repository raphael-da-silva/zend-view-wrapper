<?php

namespace SimpleZendViewWrapper;

use Zend\View\Renderer\RendererInterface;
use Zend\View\Model\ModelInterface;

/**
*
* @author Raphael da Silva / 2016
*
**/
class ZendViewRenderer
{

	private $renderer;
	private $layout;

	public function __construct(
		RendererInterface $renderer,
		ModelInterface $layout = null
	){

		$this->renderer = $renderer;
		$this->layout   = $layout;

	}

	private function configureToUseLayout($filename, array $data)
	{

		if(is_null($this->layout)){
			return $filename;
		}

		$this->layout->content = $this->renderer->render($filename, $data);
		return $this->layout;

	}

	public function render($filename, array $data = [])
	{

		$view   = $this->configureToUseLayout($filename, $data);
		$output = $this->renderer->render($view, $data);

		echo $output;

	}

}