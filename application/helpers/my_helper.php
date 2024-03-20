<?php

	function leadTime(){
		// Lead Time 30 Hari
		return 30;
	}

	function perhitunganReOrderPoint($id_request_produk = null){
		$ci =& get_instance();

		$rop = 0;
		$leadTime = leadTime();

		if ($id_request_produk != null){
			$getLastRequest = $ci->db->order_by('tgl_input', 'DESC')->get_where('request_produk', ['id_request_produk' => $id_request_produk]);
		}else{
			$getLastRequest = $ci->db->order_by('tgl_input', 'DESC')->get_where('request_produk');
		}
		if ($getLastRequest->num_rows() > 0){
			$getLastRequest = $getLastRequest->row();
			
			$rop = ($leadTime * $getLastRequest->jumlah) + (50/100 * ($leadTime * $getLastRequest->jumlah));
		}else{
			$rop = 1;
		}

		return $rop;
	}

	function base_name(){
		$name = "Supply Chain Management";
		return $name;
	}

	function swal($type = "succ", $content = ''){
		if ($type == "succ")
		{
			$text = "Yeayyyyy!";
			$icon = "success";
		}
		else
		{
			$text = "Oooppssss!";
			$icon = "error";
		}
		$html = "<script>swal.fire('".$text."', '".$content."', '".$icon."');</script>";
		return $html;
	}

	// MSG
	function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px', $col = "col-md-12") {
		if ($content != '') {
			return  '<p class="box-msg">
						<div class="small-box bg-' .$type .' '.$col.'">
							<div class="inner" style="font-size:' .$size .'">
								<i class="fa ' .$icon .'"></i>
								' .$content. '
							</div>
						</div>
				    </p>';
		}
	}

	function show_succ_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-success">
					      <div class="info-box-icon">
					      	<i class="fa fa-check-circle"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_err_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-error">
					      <div class="info-box-icon">
					      	<i class="fa fa-warning"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	//Modal
	function show_my_modal($content='', $id='', $data='', $size='md') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}

	function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>
						      
						      <div class="col-md-6">
						        <button class="form-control btn btn-primary ' .$class .'"> <i class="glyphicon glyphicon-ok-sign"></i> ' .$yes .'</button>
						      </div>
						      <div class="col-md-6">
						        <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ' .$no .'</button>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
	}
?>