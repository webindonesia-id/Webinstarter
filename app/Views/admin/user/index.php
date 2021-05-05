<?= $this->extend('admin/layouts/main'); ?>

<?= $this->section('title', 'Dashboard') ?>
    Dashboard
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="container-xl">
	<!-- Page title -->
	<div class="page-header d-print-none">
		<div class="row align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					Pengguna
				</div>
				<h2 class="page-title">
					Pengguna
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<a href="javascript:void(0)" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
						Tambah Pengguna
					</a>
					<a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-body">
	<div class="container-xl">

		<div class="row">
			<?php if(session()->getFlashData('success')) : ?>
				<span class="alert alert-success">
					<p><?= session()->getFlashData('success'); ?></p>
				</span>
			<?php endif ?>

			<?php if(session()->getFlashData('error')) : ?>
				<span class="alert alert-danger">
					<p><?= session()->getFlashData('error'); ?></p>
				</span>
			<?php endif ?>

			<?php if($validation->getErrors()) : ?>
				<span class="alert alert-danger">
					<?php foreach($validation->getErrors() as $value) : ?>
						<p><?= $value; ?></p>
					<?php endforeach; ?>
				</span>
			<?php endif ?>
		</div>
		<div class="row row-deck row-cards">
			
			<div class="col-12">
				<div class="card">
					<div class="card-body border-bottom py-3">
						<div class="d-flex">
							<div class="ms-auto text-muted">
								Search:
								<div class="ms-2 d-inline-block">
									<form action="">
										<input type="text" class="form-control form-control-sm" aria-label="Search invoice" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="<?= count($users) > 3 ? 'table-responsive' : ''; ?>"">
						<table class="table card-table table-vcenter text-nowrap datatable">
							<thead>
								<tr>
									<th class="w-1"> No. </th>
									<th>Nama</th>
									<th>Email</th>
									<th>Dibuat</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php if($users) : ?>
									<?php $no = 1; foreach($users as $user) : ?>
										<tr>
											<td><span class="text-muted"><?= $no; ?></span></td>
											<td><?= $user->user_name ?></td>
											<td><?= $user->user_email ?></td>
											<td><?= $user->user_email ?></td>
                                            <td>
                                                <?= date('d F Y', strtotime($user->user_created_at)) ?>
                                            </td>
											<td class="text-end">
												<span class="dropdown">
													<button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
													<div class="dropdown-menu dropdown-menu-end">
														<a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-edit" data-name="<?= $user->user_name; ?>" data-id="<?= $user->user_id; ?>" data-email="<?= $user->user_email; ?>">
															Edit
														</a>
														<a class="dropdown-item" href="<?= route_to('user.delete', $user->user_id); ?>" onclick="return confirm('Apakah anda yakin?')">
															Hapus
														</a>
													</div>
												</span>
											</td>
										</tr>
									<?php $no++; endforeach; ?>

								<?php else : ?>
									<tr>
										<td colspan="5" class="text-center">Data tidak tersedia</td>
									</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>

					<div class="card-footer d-flex align-items-center">
						<p class="m-0 text-muted">Showing <span><?= count($users) ?></span> to <span><?= $pager->getPerpage('users'); ?></span> of <span><?= $pager->getTotal('users'); ?></span> entries</p>
						<?= $pager->links('users', 'pagination'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<form action="<?= route_to('user.store'); ?>" method="POST">
	<div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">New User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				

				<div class="row mb-3">
					<div class="col-6">
						<label for="user_name" class="form-label">Name <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="user_name" placeholder="User name" required>
					</div>
					
					<div class="col-6">
						<label for="user_email" class="form-label">Email <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="user_email" placeholder="User Email" required>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-md-6">
						<label for="password" class="form-label">Password <span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
				
					<div class="col-md-6">
						<label for="password_confirmation" class="form-label">Password Confirmation <span class="text-danger">*</span></label>
						<input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>
					</div>
				</div>

				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
						Cancel
					</a>
					<button type="submit" class="btn btn-primary ms-auto">
						Simpan
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<form action="<?= route_to('user.update'); ?>" method="POST">
	
	<div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Ubah User</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="user_id" id="user_id">
					<input type="hidden" name="_method" value="put">

					<div class="row mb-3">
						<div class="col-6">
							<label for="user_name" class="form-label">Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="user_name" id="user_name" placeholder="User name" required>
						</div>
						
						<div class="col-6">
							<label for="user_email" class="form-label">Email <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="user_email" id="user_email" placeholder="User Email" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password" >
						</div>
					
						<div class="col-md-6">
							<label for="password_confirmation" class="form-label">Password Confirmation</label>
							<input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" >
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
						Cancel
					</a>
					<button type="submit" class="btn btn-primary ms-auto">
						Simpan
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('js') ?>
	<script>
		document.querySelector('#modal-edit').addEventListener('shown.bs.modal', function(event) {
			let data = event.relatedTarget.dataset;
			let modal = this;

			modal.querySelector('#user_id').value = data.id
			modal.querySelector('#user_name').value = data.name
			modal.querySelector('#user_email').value = data.email
		});
	</script>
<?= $this->endSection() ?>