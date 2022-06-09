<option value="" class="label"><?= $currency['title'] ?></option>
<? foreach ($currencies as $itCurrency) : ?>
	<option value="<?= $itCurrency['code'] ?>"><?= $itCurrency['title'] ?></option>
<? endforeach ?>