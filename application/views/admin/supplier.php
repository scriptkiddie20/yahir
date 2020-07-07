<!-- Begin Page Content -->
<div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                        <button type="button" onclick="ignt_add()" class="btn btn-primary btn-sm shadow"><i class="fas fa-fw fa-plus-circle mr-2"></i>Add Data Barang</button>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover shadow igntDatatables" id="dbSupplier">
                                        <thead class="thead-light">
                                        </thead>
                                        <tbody>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>

</div>
<!-- /.container-fluid -->