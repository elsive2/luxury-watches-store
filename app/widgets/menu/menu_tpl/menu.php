<li>
	<a href="category?alias=<?= $category['alias'] ?>"><?= $category['title'] ?></a>
	<? if (isset($category['childs'])) : ?>
		<ul>
			<?= $this->getHtmlMenu($category['childs']) ?>
		</ul>
	<? endif ?>
</li>