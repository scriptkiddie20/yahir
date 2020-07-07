var save_label;
var table;

$(document).ready(function () {

	$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
		return {
			"iStart": oSettings._iDisplayStart,
			"iEnd": oSettings.fnDisplayEnd(),
			"iLength": oSettings._iDisplayLength,
			"iTotal": oSettings.fnRecordsTotal(),
			"iFilteredTotal": oSettings.fnRecordsDisplay(),
			"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
			"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
		};
	};

	table = $("#databarang").DataTable({
		initComplete: function () {
			var api = this.api();
			$('#databarang_filter input')
				.off('.DT')
				.on('keyup.DT', function (e) {
					api.search(this.value).draw();
				});
		},
		oLanguage: {
			sProcessing: "loading..."
		},
		processing: true,
		serverSide: true,
		ajax: {
			"url": "igntctrl",
			"type": "POST"
		},
		// id_databarang, cabang, nama, stock, asal, kategori, harga, harga_agen, harga_reseller, harga_custom, created_at

		// render number
		// render: $.fn.dataTable.render.number(',', '.', 2, '$');
		columns: [{
				'title': '#',
				'data': 'id_databarang',
				'sortable': false,
				'searching': false,
			},
			{
				'title': 'Cabang',
				'data': 'cabang',
			},
			{
				'title': 'Nama',
				'data': 'nama',
			},
			{
				'title': 'Stock',
				'data': 'stock',
			},
			{
				'title': 'Asal',
				'data': 'asal',
			},
			{
				'title': 'Kategori',
				'data': 'kategori',
			},
			{
				'title': 'Harga',
				'data': 'harga',
			},
			{
				'title': 'Agen',
				'data': 'harga_agen',
			},
			{
				'title': 'Reseller',
				'data': 'harga_reseller',
			},
			{
				'title': 'Custom',
				'data': 'harga_custom',
			},
			{
				'title': 'Created',
				'data': 'created',
			},
			{
				'title': 'Action',
				'data': 'view',
				'sortable': false,
				'searching': false,
			}
		],
		order: [
			[1, 'asc/desc']
		],
		rowId: function (a) {
			return a;
		},
		rowCallback: function (row, data, iDisplayIndex) {
			var info = this.fnPagingInfo();
			var page = info.iPage;
			var length = info.iLength;
			var index = page * length + (iDisplayIndex + 1);
			$('td:eq(0)', row).html(index);
		}
	});

	$('#form_databarang').on('shown.bs.modal', function (e) {
		load_kategori();
	});

	$('#form_databarang').on('hidden.bs.modal', function (e) {
		var inputs = $('#form input, #form textarea, #form select');
		inputs.removeClass('is-valid is-invalid');
	});
});

function load_kategori() {
	$.ajax({
		url: "#form",
		method: 'GET',
		dataType: 'JSON',
		success: function (categories) {
			console.log(categories);
			var opsi_kategori;
			$('[name="kategori"]').html('');
			$.each(categories, function (key, val) {
				opsi_kategori = `<option value="${val.id_kategori}">${val.kategori_barang}</option>`;
				$('[name="kategori"]').append(opsi_kategori);
			});
		}
	});
}

function reload_ajax() {
	table.ajax.reload(null, false);
}

function swalert(method) {
	Swal({
		title: 'Success',
		text: 'Data berhasil ' + method,
		type: 'success'
	});
};

function ignt_add() {
	save_label = 'add';
	$('#form')[0].reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string
	$('#form_databarang').modal('show'); // show bootstrap modal
	$('.modal-title').text('Tambah Barang'); // Set Title to Bootstrap modal title
}

function ignt_edit(id) {
	save_label = 'update';
	$('#form')[0].reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string

	//Ajax Load data from ajax
	$.ajax({
		url: "karyawan/igntctrl_edit/" + id,
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			// {Set Value Form Edit}
			$('[name="id"]').val(data.id_barang);
			$('[name="nama_barang"]').val(data.nama_barang);
			$('[name="stok"]').val(data.stok);
			$('[name="kategori"]').val(data.kategori_id);

			$('#form_databarang').modal('show'); // show bootstrap modal when complete loaded
			$('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert('Error get data from ajax');
		}
	});
}

function save() {
	$('#btnSaveDB').text('saving...'); //change button text
	$('#btnSaveDB').attr('disabled', true); //set button disable
	var url, method;

	if (save_label == 'add') {
		url = "<?= base_url('karyawan/igntctrl_add') ?>";
		method = 'disimpan';
	} else {
		url = "<?= base_url('karyawan/igntctrl_update') ?>";
		method = 'diupdate';
	}

	// ajax adding data to database
	$.ajax({
		url: url,
		type: "POST",
		data: $('#form').serialize(),
		dataType: "json",
		success: function (data) {
			console.log(data);
			if (data.status) //if success close modal and reload ajax table
			{
				$('#form_databarang').modal('hide');
				reload_ajax();
				swalert(method);
			} else {
				$.each(data.errors, function (key, value) {
					$('[name="' + key + '"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
					$('[name="' + key + '"]').next().text(value); //select span help-block class set text error string
					if (value == "") {
						$('[name="' + key + '"]').removeClass('is-invalid');
						$('[name="' + key + '"]').addClass('is-valid');
					}
				});
			}
			$('#btnSaveDB').text('save'); //change button text
			$('#btnSaveDB').attr('disabled', false); //set button enable
		},
		error: function (jqXHR, textStatus, errorThrown) {
			alert('Error adding / update data');
			$('#btnSaveDB').text('save'); //change button text
			$('#btnSaveDB').attr('disabled', false); //set button enable
		}
	});

	$('#form input').on('keyup', function () {
		$(this).removeClass('is-valid is-invalid');
	});
	$('#form select').on('change', function () {
		$(this).removeClass('is-valid is-invalid');
	});
}

function ignt_hapus(id) {
	Swal({
		title: 'Anda yakin?',
		text: "Data barang akan dihapus!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus data!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: "<?= base_url('karyawan/igntctrl_delete/') ?>" + id,
				type: "POST",
				success: function (data) {
					reload_ajax();
					swalert('dihapus');
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert('Error deleting data');
				}
			});
		}
	});
}
