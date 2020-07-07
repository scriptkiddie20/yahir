<h1 id="percobaan">welcome to blog</h1>

<div class="row justify-content-center">
	<div class="col-lg-8">
		<!-- <button id="tombol" class="btn btn-facebook mb-4" onclick="createNew()">Add Data</button> -->
		<form id="insertData" method="post">
			<table class="table">
				<tr>
					<td><input type="text" name="title" class="form-control form-control-sm" placeholder="title"></td>
					<td><input type="text" name="description" class="form-control form-control-sm" placeholder="description"></td>
					<td>
						<button id="kirim" class="btn btn-primary btn-sm">Add Data</button>
					</td>
				</tr>
			</table>
		</form>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="table-body">
					<?php $i = 1;
					foreach ($results as $row) : ?>
						<tr>
							<td><?= $i++; ?></td>
							<td contenteditable="true"><?= $row['title'] ?></td>
							<td contenteditable="true"><?= $row['description'] ?></td>
							<td contenteditable="true">
								<button id="delete-row" class="btn btn-danger btn-sm">Hapus data</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>