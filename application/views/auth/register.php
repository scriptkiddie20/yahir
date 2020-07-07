<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
						</div>
						<?= $this->session->flashdata('message'); ?>
						<form action="<?= base_url('auth/register') ?>" method="post" class="user">
							<div class="form-group">
								<div class="row">
									<div class="col">
										<input type="text" name="first_name" id="first_name" class="form-control form-control-user" placeholder="Nama lengkap">
										<?= form_error('first_name', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
									<div class="col">
										<input type="text" name="last_name" id="last_name" class="form-control form-control-user" placeholder="Nama lengkap">
										<?= form_error('last_name', '<small class="text-danger pl-3">', '</small>') ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" name="fullname" id="fullname" class="form-control form-control-user" placeholder="Nama lengkap">
								<?= form_error('fullname', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Email Address">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" name="pass" id="pass" class="form-control form-control-user" placeholder="Password">
									<?= form_error('pass', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
								<div class="col-sm-6">
									<input type="password" name="pass2" id="pass2" class="form-control form-control-user" placeholder="Cofirm Password">
									<?= form_error('pass2', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Register Account
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="small" href="forgot-password.html">Forgot Password?</a>
						</div>
						<div class="text-center">
							<a class="small" href="<?= base_url('auth') ?>">Already have an account? Login!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>