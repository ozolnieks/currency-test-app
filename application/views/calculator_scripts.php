<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>
<script	src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		   crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('#js-currency-1').select2({
			theme: "classic",
			width: '100%'
		});
		$('#js-currency-2').select2({
			theme: "classic",
			width: '100%'
		});
		$('#js-currency-1').change(function(){
			let currency_1_val = $('#js-currency-1').val()
			let currency_2_val = $('#js-currency-2').val()

			if(currency_1_val !== '0'){
				$('#currency1-id').html(currency_1_val)
			}

			if(currency_1_val !== '0' && currency_2_val !== '0' && currency_1_val !== currency_2_val){
				getRate(currency_1_val, currency_2_val)
			}
			console.log($('#js-currency-1').val())
			console.log($('#js-currency-2').val())

		})

		$('#js-currency-2').change(function(){
			let currency_1_val = $('#js-currency-1').val()
			let currency_2_val = $('#js-currency-2').val()

			if(currency_2_val !== '0'){
				$('#currency2-id').html(currency_2_val)
			}

			if(currency_1_val !== '0' && currency_2_val !== '0' && currency_1_val !== currency_2_val){
				getRate(currency_1_val, currency_2_val)
			}
			console.log($('#js-currency-1').val())
			console.log($('#js-currency-2').val())

		})

		function getRate(curr1, curr2){
			$.ajax(
				{
					type:'post',
					data: {
						curr1: curr1,
						curr2: curr2
					},
					url: 'calculator/getrate',
					success:function(data)
					{
						data = JSON.parse(data)
						$.each(data, function(index, element) {
							window.rate = element
							if(element < 1){
								$('#currency2-input').val(1)
								let curr2_input_val = (1 / element).toFixed(2)
								$('#currency1-input').val(curr2_input_val)

							} else {
								$('#currency1-input').val(1)
								let curr1_input_val = (1 * element).toFixed(2)
								$('#currency2-input').val(curr1_input_val)
							}
						});

					},
					error: function(error)
					{
						console.log(error);
					}
				});
		}

		$('#currency1-input').change(function(){
			let curr1_input_val = $('#currency1-input').val()
			curr1_input_val = parseFloat(curr1_input_val)
			let curr2_input_val = (curr1_input_val * window.rate).toFixed(2)
			$('#currency2-input').val(curr2_input_val)
		})

		$('#currency2-input').change(function(){
			let curr2_input_val = $('#currency2-input').val()
			curr2_input_val = parseFloat(curr2_input_val)
			let curr1_input_val = (curr2_input_val / window.rate).toFixed(2)
			$('#currency1-input').val(curr1_input_val)

		})
	});
</script>
