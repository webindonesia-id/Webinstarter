<?= $this->extend('admin/layouts/main'); ?>


<!-- Here You Define A Title -->
<?= $this->section('title') ?>
    example title
<?= $this->endSection() ?>


<?= $this->section('content') ?>

    <?php if(true) : ?>
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">

                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Example
                        </h2>
                    </div>

                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-member">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                                Add Example
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
                
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title">Member</h3>
                        </div> -->
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <form name="search" action="" method="get">
                                            <input type="text" class="form-control form-control-sm" aria-label="Search Member" name="q" value="<?= isset($_GET['q'])?$_GET['q']:'' ?>">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                                        <th class="w-1">No.</th>
                                        <th>Name</th>
                                        <th>Badge</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" colspan="9">Data Not Found</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else : ?>

        <div class="page-body">
            <div class="container-xl d-flex flex-column justify-content-center">
                <div class="empty">
                    <div class="empty-img">
                        <img src="<?= base_url('/admin/static/illustrations/undraw_printing_invoices_5r4r.svg'); ?>" height="128" alt="">
                    </div>
                    <p class="empty-title">Example not found</p>
                    <p class="empty-subtitle text-muted">
                        Please click button below to add new example.
                    </p>
                    <div class="empty-action">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-example">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Add Example
                        </a>
                    </div>
                </div>
            </div>
        </div>        
    <?php endif ?>


    <!-- Modal Example -->
    <div class="modal modal-blur fade" id="modal-example" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a new team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row mb-3 align-items-end">
                        <div class="col-auto">
                            <a href="#" class="avatar avatar-upload rounded">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            <span class="avatar-upload-text">Add</span>
                            </a>
                        </div>
                        <div class="col">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Additional info</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Add Team</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>



<!-- Js Individual Page -->
<?= $this->section('js') ?>
    <script>

    </script>
<?= $this->endSection() ?>