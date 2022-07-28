<!doctype html>
<html lang="en">

<?php echo $head; ?>
<style>
	#footer {
		position: absolute;
		bottom: 0;
		height: 60px;

	}
</style>

<body>

<div class="container py-3">

	<?php echo $header; ?>

	<main>
		<div class="row mt-5">
			<div class="col-md-6">
				<select class="d-inline-flex" id="js-currency-1" name="state">
					<option value="0">Choose currency</option>
					<?php
					foreach($currenciesObj as $currencies)
					{
						foreach ($currencies as $index => $currency)
						{
							echo '<option value="'.$index.'">'.$currency['currencyName'].' - '.$index.'</option>';

						}
					}
					?>
				</select>
			</div>
			<div class="col-md-6">
				<select class="d-inline-flex" id="js-currency-2" name="state">
					<option value="0">Choose currency</option>
					<?php
					foreach($currenciesObj as $currencies)
					{
						foreach ($currencies as $index => $currency)
						{
							echo '<option value="'.$index.'">'.$currency['currencyName'].' - '.$index.'</option>';

						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-6">
				<div class="input-group mb-3">
					<span class="input-group-text" id="currency1-id">Id</span>
					<input type="text" id="currency1-input" class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group mb-3">
					<span class="input-group-text" id="currency2-id">Id</span>
					<input type="text" id="currency2-input" class="form-control">
				</div>
			</div>
		</div>
	</main>

	<?php echo $footer; ?>

</div>

	<?php echo $calculator_scripts; ?>

</body>
</html>
