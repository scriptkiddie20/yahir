</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website <?= date('Y'); ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>



<!-- Modal Databarang -->
<div class="modal fade" id="modal_databarang" tabindex="-1" role="dialog" aria-labelledby="modal_databarangLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal_databarangLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form">
					<h5 class="py-0 text-danger font-weight-bold">Supplier</h5>
					<div class="dropdown-divider my-3"></div>
					<div class="form-group">
						<div class="form-row d-flex align-items-end">
							<div class="col">
								<input type="text" name="namaBarang" id="namaBarang" class="form-control" placeholder="Nama barang">
							</div>
							<div class="col">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-primary text-white">Stock</div>
									</div>
									<input type="number" name="stock" id="stock" class="form-control" readonly>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row">


							<div class="col">
								<input type="text" name="kategoriBarang" id="kategoriBarang" class="form-control" placeholder="Kategori Barang" readonly>
							</div>

							<div class="col">
								<input type="text" name="asalBarang" id="asalBarang" class="form-control" placeholder="Asal Barang" readonly>
							</div>
						</div>
					</div>

					<h5 class="py-0 text-danger font-weight-bold">AliasName</h5>
					<div class="dropdown-divider my-3"></div>

					<div class="form-group">
						<div class="form-row d-flex align-items-end">
							<div class="col-lg-2">
								<label for="gbkBarang">GBK :</label>
							</div>
							<div class="col-lg-5">
								<input type="text" name="gbkBarang" id="gbkBarang" class="form-control" placeholder="AliasName GBK">
							</div>
							<div class="col-lg-5">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-primary text-white">Stock</div>
									</div>
									<input type="number" name="gbkStock" id="gbkStock" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row d-flex align-items-end">
							<div class="col-lg-2">
								<label for="gbkBarang">BDR :</label>
							</div>
							<div class="col-lg-5">
								<input type="text" name="bdrBarang" id="bdrBarang" class="form-control" placeholder="AliasName BDR">
							</div>
							<div class="col-lg-5">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-primary text-white">Stock</div>
									</div>
									<input type="number" name="bdrStock" id="bdrStock" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row d-flex align-items-end">
							<div class="col-lg-2">
								<label for="gbkBarang">Delta :</label>
							</div>
							<div class="col-lg-5">
								<input type="text" name="deltaBarang" id="deltaBarang" class="form-control" placeholder="AliasName Delta">
							</div>
							<div class="col-lg-5">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-primary text-white">Stock</div>
									</div>
									<input type="number" name="deltaStock" id="deltaStock" class="form-control">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row">
							<div class="col">
								<label for="">Harga Pokok</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-warning text-white">Rp</div>
									</div>
									<input type="number" name="hPokok" id="hPokok" class="form-control">
								</div>
							</div>
							<div class="col">
								<label for="">Harga Agen</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-warning text-white">Rp</div>
									</div>
									<input type="number" name="hAgen" id="hAgen" class="form-control">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col">
								<label for="">Harga Reseller</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-warning text-white">Rp</div>
									</div>
									<input type="number" name="hReseller" id="hReseller" class="form-control">
								</div>
							</div>
							<div class="col">
								<label for="">Harga Custom</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text bg-warning text-white">Rp</div>
									</div>
									<input type="number" name="hCustom" id="hCustom" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jquery ui -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!-- Select2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Myscript -->
<!-- <script src="<?= base_url('assets/js/yahir.js') ?>"></script> -->

<!-- jAutoCalc -->
<script src="<?= base_url('node_modules/jautocalc/dist/jautocalc.min.js') ?>"></script>
<script src="<?= base_url('node_modules/jautocalc/dist/jautocalc.js') ?>"></script>


<script>
	// function editRow(editableObj) {

	// 	$(editableObj).on('dblclick', function() {
	// 		$(this).removeAttr('readonly');
	// 	});

	// 	$(editableObj).on('keyup', function(e) {
	// 		if (e.keyCode === 13) {
	// 			$(editableObj).attr("readonly", "true");
	// 		}
	// 	})
	// }


	// $('#kirim').click(function(event) {
	// 	event.preventDefault();
	// 	var data = $('#insertData').serialize();

	// 	// $('#confirmAdd').html('<p>loading..</p>');
	// 	$.ajax({
	// 		url: 'test/add',
	// 		type: 'post',
	// 		data: data,
	// 		success: function(data) {
	// 			$('body').load('test');
	// 		}
	// 	})
	// });

	// function saveToDatabase(editableObj, column, id) {
	// 	$.ajax({
	// 		url: 'test/edit',
	// 		type: 'POST',
	// 		data: 'column=' + column + '&editVal=' + $(editableObj).text() + '&id=' + id,
	// 		success: function(data) {
	// 			console.log('edit data successfull');
	// 		}
	// 	});
	// }

	// function deleteRecord(id) {
	// 	if (confirm("Apakah anda yakin menghapus data ?")) {
	// 		$.ajax({
	// 			url: 'test/delete',
	// 			type: 'post',
	// 			data: 'id=' + id,
	// 			success: function(data) {
	// 				$('#table-row-' + id).remove();
	// 			}
	// 		})
	// 	}
	// }

	// function editable(select) {
	// 	$(select).attr('contenteditable', 'true');
	// 	$(select).keydown(function(e) {
	// 		if (e.keyCode === 9) {
	// 			$('<br>').remove();
	// 			$(select).removeAttr('contenteditable').addClass('bg-success text-white');
	// 		}
	// 	});
	// }

	// function deleteRow(id) {
	// 	$('#table-row-' + id).remove();
	// }

	// // inline tables weblesson
	function load_data() { // Load dataBarang di Invoice 
		$.ajax({
			url: 'resultBarang',
			dataType: 'JSON',
			success: function(data) {
				var i = 1;
				var html = '';
				var idInvoice = document.getElementById('idInvoice').value;
				var typeCust = document.getElementById('typeCustomer').value;

				for (var count = 0; count < data.length; count++) {
					if ((data[count].invoice_id == idInvoice)) {

						html += '<tr>';
						html += '<td>' + i++ + '</td>';
						html += '<td class="cariBarang" contenteditable data-row_id="' + data[count].id_detail + '" data-column_name="nama_Barang">' + data[count].namaBarang + '</td>';
						if (typeCust === 'Reseller') {
							html += '<td>' + data[count].harga_reseller + '</td>';
						} else if (typeCust === 'agen') {
							html += '<td>' + data[count].harga_agen + '</td>';
						} else if (typeCust === 'eceran') {
							html += '<td>' + data[count].harga_custom + '</td>';
						}
						html += '<td class="table-col" contenteditable data-row_id="' + data[count].id_detail + '" data-column_name="qty">' + data[count].qty + '</td>';
						html += '<td>' + formatAngka(data[count].total) + '</td>';
						html += '<td><button type="button" id="' + data[count].id_detail + '" class="btn btn-danger btn-sm btn_Delete">Hapus</button></td></tr>';
					}
				}
				$('#table-body:last-child').html(html);
				inputBrg_invoice()
			}
		});
	}

	// function insert_data() {
	// 	// var id_databarang = $('#namaBarang').val();
	// 	var qtyBarang = $('#qtyBarang').val();
	// 	var totals = $('#totals').val();

	// 	$.ajax({
	// 		url: 'insert_data',
	// 		type: 'post',
	// 		data: {
	// 			// id_databarang: id_databarang,
	// 			qtyBarang: qtyBarang,
	// 			totals: totals,
	// 		},
	// 		success: function(data) {
	// 			load_data()
	// 		}
	// 	})
	// }


	// function edit_data() {
	// 	$.ajax({
	// 		url: 'edit_data',
	// 		type: 'post',
	// 		data: {

	// 		},
	// 		success: function(data) {
	// 			load_data()
	// 		}
	// 	})
	// }

	// function delete_data() {
	// 	if (confirm("Apakah anda yakin mau hapus data ini ?")) {
	// 		$.ajax({
	// 			url: 'delete_data',
	// 			type: 'post',
	// 			data: {

	// 			},
	// 			success: function(data) {
	// 				load_data()
	// 			}
	// 		})
	// 	}
	// }

	// function td_autocomplete() {

	// 	$('#cariBarang').autocomplete({
	// 		source: function(request, response) {
	// 			$.ajax({
	// 				url: 'inputBarang_invoice',
	// 				type: 'post',
	// 				dataType: 'json',
	// 				data: {
	// 					search: request.term
	// 				},
	// 				success: function(data) {
	// 					response(data)
	// 				}
	// 			})
	// 		},
	// 		select: function(event, ui) {
	// 			$('#hSatuan').val(ui.item.agen);
	// 		}
	// 	})
	// }



	function enter_focus() {
		$('#namaCustomer').on('keyup', function(e) {
			if (e.keyCode === 13) {
				$('#formCust').submit();
				$('#cariBarang').focus();
			}
		})

		$('#cariBarang').on('keyup', function(e) {
			if (e.keyCode === 13) {
				$('#qtyBarang').focus();
			}
		})

		$('#qtyBarang').on('keyup', function(e) {
			if (e.keyCode === 13) {
				$('#tambahBarang').focus();
			}
		})
	}

	// fungsi format angka ribuan
	function formatAngka(bilangan) {
		var number_string = bilangan.toString(),
			sisa = number_string.length % 3,
			rupiah = number_string.substr(0, sisa),
			ribuan = number_string.substr(sisa).match(/\d{3}/g);

		if (ribuan) {
			separator = sisa ? ',' : '';
			rupiah += separator + ribuan.join(',');
		}

		return rupiah;
	}

	// Autocomplete Input nama customer - invoice
	function inputCust_invoice() {
		// $.fn.val = $.fn.html;
		$("#namaCustomer").autocomplete({
			source: function(request, response) {
				// Fetch data
				$.ajax({
					url: "inputCustomer_invoice",
					type: 'post',
					dataType: "json",
					data: {
						search: request.term
					},
					success: function(data) {
						response(data);
					}
				});
			},
			// Set AutoValue
			select: function(event, ui) {
				// Set selection
				// $.fn.val = $.fn.html;

				$('#id_customer').val(ui.item.idCust);
				$('#nohp').val(ui.item.nohp);
				$('#type').val(ui.item.type);
				$('#alamat').val(ui.item.alamat);
				return false;
			}
		});
	}

	// Autocomplete Input barang - invoice 
	function inputBrg_invoice() {

		$("#cariBarang").autocomplete({
			source: function(request, response) {
				// Fetch data
				$.ajax({
					url: "inputBarang_invoice",
					type: 'post',
					dataType: "json",
					data: {
						search: request.term
					},
					success: function(data) {
						response(data);
					}
				});
			},
			// Set AutoValue
			select: function(event, ui) {
				// Set selection
				// default td editable
				$.fn.val = $.fn.html;
				$('#hSatuan').val(ui.item.agen); // save selected id to input
				$('#idBarang').val(ui.item.idBarang); // save selected id to input
				// var agen = document.getElementById('typeCustomer').value = 'Agen';
				// var reseller = document.getElementById('typeCustomer').value = 'Reseller';
				// var eceran = document.getElementById('typeCustomer').value = 'Eceran';

				// if (agen == 'agen') {} else if (reseller == 'Reseller') {
				// 	$('#hSatuan').val(ui.item.reseller); // save selected id to input
				// } else if (eceran == 'eceran') {
				// 	$('#hSatuan').val(ui.item.custom); // save selected id to input
				// }
				return false;
			}
		});
	}

	// if ($('#namaCustomer, #nohp, #type, #alamat')) {
	// 	document.getElementById("namaCustomer").value = getSavedValue("namaCustomer"); // set the value to this input
	// 	document.getElementById("nohp").value = getSavedValue("nohp"); // set the value to this input
	// 	document.getElementById("type").value = getSavedValue("type"); // set the value to this input
	// 	document.getElementById("alamat").value = getSavedValue("alamat"); // set the value to this input
	// 	/* Here you can add more inputs to set value. if it's saved */

	// 	//Save the value function - save it to localStorage as (ID, VALUE)
	// 	function saveValue(e) {
	// 		var id = e.id; // get the sender's id to save it . 
	// 		var val = e.value; // get the value. 
	// 		localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override . 
	// 	}

	// 	//get the saved value function - return the value of "v" from localStorage. 
	// 	function getSavedValue(v) {
	// 		if (!localStorage.getItem(v)) {
	// 			return ""; // You can change this to your defualt value. 
	// 		}
	// 		return localStorage.getItem(v);
	// 	}
	// }


	// $('#kirim').click(function() {
	// 	var name = $('#namaLengkap').val();
	// 	var email = $('#emails').val();
	// 	var phone = $('#nohp').val();
	// 	var kelamin = $('#typeKelamin').val();
	// 	var alamat = $('#alamat').val();

	// 	$.ajax({
	// 		type: 'POST',
	// 		url: 'test/inputUsers',
	// 		data: {
	// 			names: nama,
	// 			emails: email,
	// 			phones: phone,
	// 			kelamins: kelamin,
	// 			alamats: alamat,
	// 		},
	// 		success: function(data) {
	// 			console.log('success');
	// 		}
	// 	})
	// })


	$(document).ready(function() {


		inputCust_invoice();
		$('#qtyBarang').keyup(function() {
			var hSatuan = $('#hSatuan').val()
			var qtyBarang = $('#qtyBarang').val().split('<br>').join('');
			var total = hSatuan * qtyBarang;

			// Cetak hasil
			$('#total').text(formatAngka(total));
		})

		// total sum hargaBarang * qtyBarang
		$('#tambahBarang').on('keyup', function(e) {

			if (e.keyCode === 13) {
				var idInvoice = document.getElementById("idInvoice").value;
				var idBarang = $('#idBarang').text();
				var qtyBarang = $('#qtyBarang').val();
				var total = $('#total').val().toString().split(',').join('');
				$.ajax({
					url: 'insert_data',
					type: 'post',
					data: {
						idInvoice: idInvoice,
						idBarang: idBarang,
						qtyBarang: qtyBarang,
						total: total,
					},
					success: function(data) {
						load_data();
						$('#cariBarang').focus();
						$("#cariBarang, #hSatuan, #qtyBarang, #total").val('').trigger("chosen:updated");
					}
				})
			}
		});

		enter_focus();
		inputBrg_invoice()





		// 	$('#sends').on('click', function() {

		// 		var data = $('#addUser_invoice').serialize();
		// 		// var idBrg = $('.idBrg').val();
		// 		// var qty = $('#table-body tr td').eq(2).text();
		// 		// var total = $('#table-body tr td').eq(3).text();

		// 		$.ajax({
		// 			url: 'addCustomer_invoice',
		// 			type: 'post',
		// 			data: data,
		// 			success: function(data) {
		// 				alert('success input data');
		// 			}
		// 		});
		// 	})
	});
</script>

</body>

</html>