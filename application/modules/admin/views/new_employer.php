
<!-- row -->
<div class="container-fluid">
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Create New Employer</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Employers</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">New Employer</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">New</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form id="hbForm" name="hbForm" role="form" method="post" action="<?php echo base_url('admin/employers/create_new_employer'); ?>" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" name="company_name" id="company_name" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company URL</label>
                            <input type="text" class="form-control" placeholder="Company URL" name="company_url" id="company_url" value="">
                        </div>
                        <div class="form-group col-md-6">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Logo</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Description</label>
                            <textarea class="form-control" rows="4" id="company_desc" name="company_desc"></textarea>
                        </div>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Create New Employer</button>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
</div>
        