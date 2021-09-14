
<!-- row -->
<div class="container-fluid">
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Jobs</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Jobs</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Jobs</h4>
                <a href="<?php echo base_url('admin/jobs/create_new_job') ?>"><button type="button" class="btn btn-primary">New Job</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Job ID</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Job Type</th>
                                <th scope="col">Posting Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                if(is_array($all_jobs) && count($all_jobs)>0)
                                {
                                    foreach($all_jobs as $k=>$v)
                                    {
                            ?>
                                <tr>
                                <td><?php echo $v['job_id']; ?></td>
                                <td><?php echo $v['job_title']; ?></td>
                                <td><?php echo $v['job_type']; ?></td>
                                <td><?php echo $v['job_posting_date']; ?></td>
                                <td><span><a href="javascript:void(0);" class="mr-4" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i
                                                class="fa fa-pencil color-muted"></i> </a><a
                                            href="javascript:void()" data-toggle="tooltip"
                                            data-placement="top" title="Close"><i
                                                class="fa fa-close color-danger"></i></a></span>
                                </td>
                            </tr>   
                            <?php
                                    }
                                }
                           ?>                            
                        </tbody>
                    </table>
                </div>
                <?php if($enable_pagination == 'Y')
                    {
                ?>
                <div class="pagination">
                <nav>
                    <ul class="pagination pagination-gutter">
                    <li class="page-item"><a class="page-link" href="javascript:void()"><?php echo $showing_record; ?> Results of <?php echo $total_record; ?></a></li>
                        <li class="page-item page-indicator">
                            <a class="page-link" href="<?php echo (($current_page-1)>0)? base_url('admin/jobs/view_all?page='.($current_page-1)) :base_url('admin/jobs/view_all?page=1') ; ?>">
                                <i class="icon-arrow-left"></i></a>
                        </li>
                        <?php
                        if($total_page > 0)
                        {
                            for($p=$current_page; $p<=$current_page+9; $p++)
                            {
                                if($p <= $total_page)
                                {
                        ?>
                                <li class="page-item <?php echo ($p==$current_page)? 'active':'' ?>"><a class="page-link" href="<?php echo base_url('admin/jobs/view_all?page='.$p) ?>"><?php echo $p; ?></a></li>
                        <?php
                                }
                            }
                        }
                        ?>
                        
                        <?php
                            if($p < $total_page)
                            {
                        ?>
                        <li class="page-item page-indicator">
                            <a class="page-link" href="<?php echo base_url('admin/jobs/view_all?page='.$p) ?>">
                                <i class="icon-arrow-right"></i></a>
                        </li>
                        <?php
                            } 
                        ?>
                    </ul>
                </nav>
                </div>
                <?php
            }
        ?>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
        