<?php

namespace ishop;

class Pagination
{
	public $currentPage;
	public $perPage;
	public $total;
	public $countPages;
	public $uri;

	public function __construct($page, $perPage, $total)
	{
		$this->perPage = $perPage;
		$this->total = $total;
		$this->countPages = $this->getCountPages();
		$this->currentPage = $this->getCurrentPage($page);
		$this->uri = $this->getParams();
		debug($this->uri);
	}

	public function getCountPages()
	{
		return ceil($this->total / $this->perPage) ?: 1;
	}

	public function getCurrentPage($page)
	{
		if (!$page || $page < 1) {
			$page = 1;
		}
		if ($page > $this->countPages) {
			$page = $this->countPages;
		}
		return $page;
	}

	public function getStart()
	{
		return ($this->currentPage - 1) * $this->perPage;
	}

	public function getParams()
	{
	    $components = parse_url($_SERVER['REQUEST_URI']);
	    $symb = isset($components['query']) ? '&' : '?';
		return preg_replace('/&?page=\d+&?/', '', $_SERVER['REQUEST_URI']) . $symb;
	}

	public function getHtml()
	{
		$back = null;
		$forward = null;
		$startPage = null;
		$endPage = null;
		$page2left = null;
		$page1left = null;
		$page2right = null;
		$page1right = null;

		if ($this->currentPage > 1) {
			$back = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->currentPage - 1) . "'>&lt;</a></li>";
		}
		if ($this->currentPage < $this->countPages) {
			$forward = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->currentPage + 1) . "'>&gt;</a></li>";
		}
		if ($this->currentPage > 3) {
			$startPage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo;</a></li>";
		}
		if ($this->currentPage < ($this->countPages - 2)) {
			$endPage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
		}
		if ($this->currentPage - 2 > 0) {
			$page2left = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->currentPage - 2) . "'>" . ($this->currentPage - 2) . "</a></li>";
		}
		if ($this->currentPage - 1 > 0) {
			$page1left = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->currentPage - 1) . "'>" . ($this->currentPage - 1) . "</a></li>";
		}
		if ($this->currentPage + 1 <= $this->countPages) {
			$page1right = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->currentPage + 1) . "'>" . ($this->currentPage + 1) . "</a></li>";
		}
		if ($this->currentPage + 2 <= $this->countPages) {
			$page2right = "<li><a class='nav-link' href='{$this->uri}page=" . ($this->currentPage + 2) . "'>" . ($this->currentPage + 2) . "</a></li>";
		}

		return '<ul class="pagination">' . $startPage . $back . $page2left . $page1left . '<li class="active"><a>' . $this->currentPage . '</a></li>' . $page1right . $page2right . $forward . $endPage . '</ul>';
	}

	public function __toString()
	{
		return $this->getHtml();
	}
}
