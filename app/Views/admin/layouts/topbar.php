<header class="navbar navbar-light d-print-none">
	<div class="container-xl">

		<div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
			<div class="nav-item d-none d-md-flex me-3">
				<div class="btn-list">
					<a href="" class="btn btn-outline-white" target="_blank" rel="noreferrer">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 7h-5a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-5" /><line x1="10" y1="14" x2="20" y2="4" /><polyline points="15 4 20 4 20 9" /></svg>
						Lihat Website
					</a>
				</div>
			</div>
		</div>

		<div class="navbar-nav flex-row order-md-last">
			<div class="nav-item dropdown d-none d-md-flex me-3">
				<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
					<span class="badge bg-red"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
					<div class="card">
						<div class="card-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime necessitatibus ullam.
						</div>
					</div>
				</div>
			</div>

			<div class="nav-item dropdown">
				<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
					<span class="avatar avatar-sm" style="background-image: url(<?= base_url('admin/static/avatars/000m.jpg') ?>)"></span>
					<div class="d-none d-xl-block ps-2">
						<div>Paweł Kuna</div>
						<div class="mt-1 small text-muted">Admin</div>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
					<a href="#" class="dropdown-item">Edit Profile</a>
					<a href="#" class="dropdown-item">Change password</a>
					<div class="dropdown-divider"></div>
					<a href="#" data-bs-toggle="modal" data-bs-target="#modal-logout" class="dropdown-item">Logout</a>
				</div>
			</div>
		</div>

	</div>
</header>

<div class="modal modal-blur fade" id="modal-logout" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
			<div class="modal-title">Apakah anda yakin untuk keluar?</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
				<a href="<?= route_to('admin.logout'); ?>" class="btn btn-danger">Keluar</a>
			</div>
		</div>
	</div>
</div>