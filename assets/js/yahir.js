// Defines Variable
var save_label;
var table;

// Column Custom For DataTables
function customColumn($urls) {
	switch (window.location.href) {
		case $urls + 'karyawan/databarang':
			return [{
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
					'data': 'namaBarang',
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
			]
			break;

			// id_supplier, product, kategori, asal, supplier, stock, created_at, updated_at
		case $urls + 'admin/supplier':
			return [{
				'title': '#',
				'data': 'id_supplier',
				'sortable': false,
				'searching': false
			}, {
				'title': 'Product',
				'data': 'product',
			}, {
				'title': 'Kategori',
				'data': 'kategori',
			}, {
				'title': 'Asal',
				'data': 'asal',
			}, {
				'title': 'Supplier',
				'data': 'supplier',
			}, {
				'title': 'Stock',
				'data': 'stock',
			}, {
				'title': 'Updated',
				'data': 'updated_at',
			}, {
				'title': 'Action',
				'data': 'view',
				'sortable': false,
				'searching': false
			}];
			break;

			// id_customer, namaCustomer, nohp, alamat, namaKaryawan, type, sumber, created_at, updated_at
		case $urls + 'karyawan/datacustomer':
			return [{
				'title': '#',
				'data': 'id_customer',
				'sortable': false,
				'searching': false
			}, {
				'title': 'Nama',
				'data': 'namaCustomer',
			}, {
				'title': 'Hp',
				'data': 'nohp',
			}, {
				'title': 'Alamat',
				'data': 'alamat',
			}, {
				'title': 'Admin',
				'data': 'namaKaryawan',
			}, {
				'title': 'Type',
				'data': 'type',
			}, {
				'title': 'Created',
				'data': 'updated_at',
			}, {
				'title': 'Action',
				'data': 'view',
				'sortable': false,
				'searching': false
			}];
			break;

			// id_invoice, namaKaryawan, namaCustomer, type_pembayaran, ekspedisi, tInvoice, namaBarang, qty, tInvoiceDetail, created, updated
		case $urls + 'karyawan':
			return [{
				'title': '#',
				'data': 'id_invoice',
				'sortable': false,
				'searching': false
			}, {
				'title': 'Karyawan',
				'data': 'namaKaryawan',
			}, {
				'title': 'Customer',
				'data': 'namaCustomer',
			}, {
				'title': 'Pembayaran',
				'data': 'type_pembayaran',
			}, {
				'title': 'Ekspedisi',
				'data': 'ekspedisi',
			}, {
				'title': 'Total',
				'data': 'tInvoice',
			}, {
				'title': 'Created',
				'data': 'created',
			}, {
				'title': 'Updated',
				'data': 'updated',
			}, {
				'title': 'Action',
				'data': 'view',
				'sortable': false,
				'searching': false
			}];
			break;

		default:
			break;
	}
}

// Custom Url/page for DataTables
function customUrl($urls) {

	switch (window.location.href) {
		case $urls + 'karyawan/databarang':
			return 'igntctrl'
			break;
		case $urls + 'admin/supplier':
			return 'dbSupplier';
			break;
		case $urls + 'karyawan/datacustomer':
			return 'dtCustomer';
			break;
		case $urls + 'karyawan':
			return 'karyawan/dtInvoice';
			break;

		default:
			break;
	}
}

// Document readyFunction
$(document).ready(function () {

	// Setup Datatables ServerSide
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

	// Data for DataTables ServerSide
	table = $(".igntDatatables").DataTable({
		initComplete: function () {
			var api = this.api();
			$('.igntDatatables_filter input')
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
			"url": customUrl('http://localhost/yahirs/'),
			"type": "POST"
		},
		// id_databarang, cabang, namaBarang, stock, asal, kategori, harga, harga_agen, harga_reseller, harga_custom, created

		// render number
		// render: $.fn.dataTable.render.number(',', '.', 2, '$');
		columns: customColumn('http://localhost/yahirs/'),
		order: [
			[1, 'asc']
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

});
