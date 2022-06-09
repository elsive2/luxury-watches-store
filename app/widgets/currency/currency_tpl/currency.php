<option value="" class="label"><?= $currency['title'] ?></option>
<? foreach ($currencies as $itCurrency) : ?>
	<? if ($itCurrency['code'] != $currency['code']) : ?>
		<option value="<?= $itCurrency['code'] ?>"><?= $itCurrency['title'] ?></option>
	<? endif ?>
<? endforeach ?>