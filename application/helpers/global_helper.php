<?php
function alert($pesan){
	echo "<script type='text/javascript'>alert('".$pesan."')</script>";
}
function back(){
	echo "<script type='text/javascript'>history.go(-1)</script>";
}
function get_waktu($strip,$format){
	$asal = new Datetime($strip);
	$waktu = $asal->format($format);
	return $waktu;
}
function get_timestamp($format){
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
	$dt->setTimestamp($timestamp);
	return $dt->format($format);
}
function my_form($dt_form){ // to auto generate input form
	$htmlAwal = '<div class="modal-body">';
	$htmlMid = '';
	$htmlAkhir = '</div>';
	foreach($dt_form as $res){
		$htmlMid .= '<div class="form-group">';
		if(count($res) > 1){ // use row & col
			$htmlMid .= '<div class="row">';
			$htmlMid .= my_input($res,'much');
			$htmlMid .= '</div>';
		}else{
			$htmlMid .= my_input($res,'one');
		}
		$htmlMid .= '</div>';
	}
	return $htmlAwal.$htmlMid.$htmlAkhir;
}

function my_input($val,$param){
	$html = "";
		foreach($val as $val2){
			if($param == 'much'){ $html.= '<div class="col">'; }
			$html .= '<label for="'.$val2['id'].'">'.$val2['label'].'</label>';
			$html .= '<div class="input-group">';
			$dt_group = array(
				'name' 				=> $val2['name'],
				'placeholder' => $val2['placeholder'],
				'class' 			=> 'form-control '.$val2['addClass'],
				'id'					=> $val2['id']);
			if($val2['required']){ $dt_group['required'] = true; }
			switch ($val2['form']) {
				case 'textarea':
					$dt_group['rows'] = '3';
					$dt_group['resize'] = 'none';
					$html .= form_textarea($dt_group);
					break;

				case 'select':
						$html .= form_dropdown($val2['name'],$val2['dt_select'],$val2['dt_selected'],
										array('class' => $dt_group['class'],'id' => $dt_group['id'],'required' => $dt_group['required']));
						break;


				default:
					$dt_group['type'] = $val2['type'];
					$html .= form_input($dt_group);
					break;
			}
			$html .= '<div class="invalid-feedback"> silakan isi '.$val2['placeholder'].'</div>';
			$html .= '</div>';
			if($param == 'much'){ $html.= '</div>'; }
		}
	return $html;
}
?>
