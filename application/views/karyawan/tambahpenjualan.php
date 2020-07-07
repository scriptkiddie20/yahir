<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 bg-info d-flex justify-content-between">
					<h6 class="m-0 font-weight-bold text-white">Input Data Customer</h6>
				</div>
				<div class="card-body">
					<!-- Start Form Input Data Customer -->
					<form action="<?= $_SERVER['PHP_SELF']; ?>" id="formCust" method="get">

						<div>
							<div class="form-group">
								<input type="hidden" name="idInvoice" id="idInvoice" class="form-control" value="<?= $invoice ?>">
							</div>
							<div class="form-row d-flex align-items-end">
								<div class="col-lg-9">
									<div class="form-group">
										<label for="namaCustomer">Nama Customer</label>
										<input type="hidden" id="id_customer">
										<input type="text" name="namaCust" id="namaCustomer" class="form-control" autofocus>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<button class="btn btn-primary">Add</button>
									</div>
								</div>
							</div>

							<div class="form-row">
								<div class="col-lg-8">
									<div class="form-group">
										<label for="nohp">No Hp</label>
										<input type="number" id="nohp" class="form-control" readonly>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="type">Type</label>
										<input type="text" name="type" id="type" class="form-control" readonly>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" id="alamat" class="form-control" readonly>
							</div>
							<input type="submit" class="btn btn-success">
						</div>
					</form>
					<!-- End Input Data Customer -->
				</div>
			</div>
		</div>

		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex justify-content-between align-items-center">
					<h6 class="m-0 font-weight-bold text-primary">List Order</h6>
					<button id="sends" class="btn btn-primary btn-sm">Submit</button>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-sm table-bordered">
							<thead>
								<tr>
									<th>Nama barang</th>
									<th>Harga</th>
									<th>Qty</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="cart" class="cart">
								<tr class=" bg-primary text-white">
									<input type="hidden" id="idBarang">
									<td id="cariBarang" class="cariBarang" contenteditable></td>
									<td id="hSatuan"></td>
									<td id="qtyBarang" contenteditable></td>
									<td id="total"></td>
									<td><button type="button" id="tambahBarang" class="btn btn-success btn-sm shadow border-white">Tambah</button></td>
								</tr>
								<!-- <tr id="line_items" class="line_items">
									<td>
										<input type="hidden" id="idBrg">
										<input type=" text" id="nBarang" class="form-control form-control-sm inputClear nBarang">
									</td>
									<td>
										<input type="text" id="hSatuan" class="form-control form-control-sm inputClear" disabled>
									</td>
									<td>
										<input type="text" id="qtyBarang" class="form-control form-control-sm inputClear">
									</td>
									<td>
										<input type="text" id="total" class="form-control form-control-sm inputClear" disabled>
									</td>
								</tr> -->
							</tbody>
						</table>
					</div>

					<!-- table list product -->
					<div class="table-responsive">
						<table class="table table-sm table-striped shadow igntDatatables" id="dataBarang">
							<thead class="thead-light">
								<tr>
									<th width="5%">#</th>
									<th width="30%">Nama Barang</th>
									<th width="15%">Harga Satuan</th>
									<th width="10%">Qty</th>
									<th width="25%">Total</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody id="table-body" class="cart">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?= $_GET['idInvoice'] ?>

</div>
<!-- /.container-fluid -->