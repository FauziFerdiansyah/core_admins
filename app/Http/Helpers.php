<?php
function rupiah_format($amount) {
	$convert = 'Rp. '.number_format($amount, 0 , '' , '.'). ',-';
	return $convert;
}

function email_convert($email) {
	return '<a href="mailto:'. $email .'">'. $email .'</a>';
}

function EYD_word($text) {
	return str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($text))));
}

function status_list() {
	$status = [
		'1' => 'Inactive',
		'2' => 'Active'
	];
	return $status;
}

function status($status, $label = true) {
	if ($status == 1) {
		$string = "Inactive";
		$label_type = "danger";
	}elseif ($status == 2) {
		$string = "Active";
		$label_type = "info";
	}
	if ($label == true) {
        $string = "<div class='label label-md label-".$label_type."' w-100 text-center'>".$string."</div>";
	}

	return $string;
}

function gender_list() {
	$status = [
		'Perempuan',
		'Laki-laki'
	];

	return $status;
}

function gender_convert($status, $label = true) {
	if ($status == 0) {
		$string = "Perempuan";
		$label_type = "danger";
	}elseif ($status == 1) {
		$string = "Laki-Laki";
		$label_type = "primary";
	}

	if ($label == true) {
		$string = "<small class='label label-" . $label_type . "'>" . $string . "</small>";
	}

	return $string;
}

function humanize_datetime_format($datetime) {
	if ($datetime == null) {
		return null;
	}

	return Carbon\Carbon::parse($datetime)->format('l\\, j F Y H:i:s');
}

function humanize_day_format($date) {
	if ($date == null) {
		return null;
	}

	return Carbon\Carbon::parse($date)->format('l\\, j F Y');
}

function humanize_date_format($date) {
	if ($date == null) {
		return null;
	}

	return Carbon\Carbon::parse($date)->format('j M Y');
}

function humanize_date_format_slash($date) {
	if ($date == null) {
		return null;
	}
	return Carbon\Carbon::parse($date)->format('m/d/Y');
}

function gramToKg($weight) {
	return $weight / 1000;
}

function customer_avatar($customer_data) {
	$output = asset('front-end/img/img-error/img-240-240.png');
	if(!empty($customer_data)){
		//$image_path = 'avatar_customer/' . $customer_data->id . '/' . $customer_data->image;
		$image_path = $customer_data;
		if (Storage::exists($image_path)) {
			$output = Storage::url($image_path);
		}
	}
	return $output;
}

function getProductImage($product_image_data, $size = null) {
	/*
	* size available :
	* thumbnail => 70, 85,
	* small => 278, 338,
	* medium = null => 370, 450,
	* large => 1233, 1500
	*/
	$image = asset('front-end/img/img-error/img-product-' . $size . '.png');
	if (!empty($product_image_data)) {
		$image_path = 'products/' . $product_image_data->variation->product->id . '/' . $product_image_data->sku . '/' . $product_image_data->id . '/' . $size . '_' . $product_image_data->image;
		if (Storage::exists($image_path)) {
			$image = Storage::url($image_path);
		}
	}

	return $image;
}

function getImage($image_data, $width = 370, $height = 450) {
	$image = asset('front-end/img/img-error/img-' . $width . '-' . $height . '.png');
	if (!empty($image_data)) {
		if (Storage::exists($image_data)) {
			$image = Storage::url($image_data);
		}
	}

	return $image;
}


?>
