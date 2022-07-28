<!doctype html>
<html lang="en">

<?php echo $head; ?>

<body>
<div class="container py-3">

	<?php echo $header; ?>

	<main>
		<table class="table">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Currency name</th>
				<th scope="col">Currency symbol</th>
				<th scope="col">Currency id</th>
			</tr>
			</thead>
			<tbody>
			<?php

				foreach($currenciesObj as $currencies)
				{
					$i=1;
					foreach ($currencies as $index => $currency)
					{
						echo 	'<tr>
									<th scope="row">'.$i.'</th>
									<td>'.(isset($currency['currencyName']) ? $currency['currencyName'] : "-").'</td>
									<td>'.(isset($currency['currencySymbol']) ? $currency['currencySymbol'] : "-").'</td>
									<td>'.$index.'</td>
								</tr>';
						$i++;
					}
				}
			?>
			</tbody>
		</table>

	</main>

	<?php echo $footer; ?>
</div>
</body>
</html>
