<?php
	if(isset($_POST)){
		require("./modules/payment/liqpay/LiqPay.php");

		//print_r($_POST);

		$order_id = 'lfc_'.rand(10000, 99999);

		$liqpay = new LiqPay('i777828157', 'U7wCLtzMO3RRWVnZob6fjCRMSaanZh9D4jBZKChu');
		$html = $liqpay->cnb_form(array(
			'action'					=> 'pay',
			'version'        	=> '3',
			'amount'         	=> $_POST['amount'],
			'currency'       	=> 'UAH',
			'description'    	=> 'Оплата на сайте https://lifechangerfsu.org/',
			'order_id'       	=> $order_id,
			'language'      	=> 'ru',
			'type'          	=> 'donate',
			'sandbox' 				=> '1'
		));
		echo $html;
		?>
		<link rel="stylesheet" href="./modules/payment/css/style.css">
		<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		<script src='./modules/payment/js/vanilla.main.js'></script>
<?php
	}else{
		exit('Error');
	}
?>