// 商品詳細モーダル
$('.shop_modal').on('click', function() {
	var productId = $(this).attr("id");
	var image = $(this).attr("src");
	var productName = $(this).parent().children(".product-title").children(".name").text();
	var productPrice = $(this).parent().children(".product-title").children(".price").text();
	var discountVal = $(this).parent().children(".discount_banner").text();

	// 
	$('#product_id').text(productId);
	$('#modal_img').attr({src: image});
	$('#product_name').text(productName);
	$('#product_price').text(productPrice);
	$('#discount_val').text(discountVal);


	// buttons
	var result = document.cookie.indexOf('xx');
	if (result !== -1) {
		$('#afterChoose').show();
	} else {
		$('#beforeChoose').show();
	}


	$.ajax({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			'contentType': "application/json"
		},
		url: "top",
		type: "POST",
		data: {
			id: productId,
		}
	})
	// 成功時の処理
	.done(function(data){
		var sizeList = data['sizeList'];
		for (var i = 0; i < sizeList.length; i++) {
			var op = $('<option></option>').attr({
				class: "new_stock form-control modal_input",
				value: sizeList[i]
			});
			// sizeList[i]

			op.text(sizeList[i]);
			$('#size_selection').append(op);
		}

		$('#modal_ec').show();
	})
	// 失敗時の処理
	.fail(function(){
		$('#error').text("通信エラー: 情報が取得できませんでした");
		$('#error').show();
	});


	// カートに追加リクエスト処理
	addItemToCart(productId);

	// カートから除くリクエスト処理
	removeItemToCart(productId);
});

$('#put_item_btn').on('click', function() {
});

$('#remove_item_btn').on('click', function() {
});

$('#check_cart_btn').on('click', function() {
	window.location.href = "users/cart";
});


$('.close_btn').on('click', function() {
	$('#modal_ec').hide();
	// モーダル内の商品情報、エラーメッセージをクリア
	$('#guidance').text("");
	$('#product_id').text("");
	$('#modal_img').attr({src: ""});
	$('#product_name').text("");
	$('#product_price').text("");
	$('#discount_val').text("");
});

// カートに追加リクエスト処理
function addItemToCart(productId) {
	$('#put_item_btn').on('click', function() {
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'contentType': "application/json"
			},
			url: "",
			type: "GET",
			// data: { _method: "PUT", userId: "$u_id", productId: productId, size: $('#size_selection').val() , numOfBuy: $('#num_of_buy').val() }
			// data: { _method: "PUT", id: productId }
			data: { id: productId }

		})
		.done(function(data){
			$('#guidance').text("カートへ追加しました");
			$('#guidance').show();
			$('#beforeChoose').hide();
			$('#afterChoose').show();

		})
		.fail(function(){
			$('#guidance').text("通信エラー: カートへ追加できませんでした");
			$('#guidance').show();
		});
	});
}

// カートから除くリクエスト処理
function removeItemToCart(productId) {
	$('#remove_item_btn').on('click', function() {
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
				'contentType': "application/json"
			},
			url: "",
			type: "GET",
			// data: { _method: "PUT", userId: "$u_id", productId: productId, size: $('#size_selection').val() , numOfBuy: $('#num_of_buy').val() }
			// data: { _method: "PUT", id: productId }
			data: { id: productId }



		})
		.done(function(data){
			$('#guidance').text("カートから削除しました");
			$('#guidance').show();
			$('#afterChoose').hide();
			$('#beforeChoose').show();
		})
		.fail(function(){
			$('#guidance').text("通信エラー: カートの更新ができませんでした");
			$('#guidance').show();
		});
	});
}