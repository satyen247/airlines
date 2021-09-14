
<!-- row -->
<div class="container-fluid">
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Employers</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Employers</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Employers</h4>
                <a href="<?php echo base_url('admin/employers/create_new_employer') ?>"><button type="button" class="btn btn-primary">New Employer</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Employer</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Copany URL</th>
                                <th scope="col">Signup Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                if(is_array($employers) && count($employers)>0)
                                {
                                    foreach($employers as $k=>$v)
                                    {
                            ?>
                                <tr>
                                <td><img src="<?php echo ($v['company_logo'] != '') ? base_url($v['company_logo']) : base_url('assets/uploads/logo.png'); ?>" alt="image" class="mr-3" style="width:50px; height:50px;"></td>
                                <td><?php echo $v['company_name']; ?></td>
                                <td><?php echo $v['company_url']; ?></td>
                                <td><?php echo $v['signup_date']; ?></td>
                                <td><span><a href="<?php echo base_url('admin/employers/edit/'.$v['_id']) ?>" class="mr-4" data-toggle="tooltip"
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
                            <a class="page-link" href="<?php echo (($current_page-1)>0)? base_url('admin/employers/view_all?page='.($current_page-1)) :base_url('admin/employers/view_all?page=1') ; ?>">
                                <i class="icon-arrow-left"></i></a>
                        </li>
                        <?php
                        if($total_page > 0)
                        {
                            for($p=$current_page; $p<=$current_page+10; $p++)
                            {
                                if($p <= $total_page)
                                {
                        ?>
                                <li class="page-item <?php echo ($p==$current_page)? 'active':'' ?>"><a class="page-link" href="<?php echo base_url('admin/employers/view_all?page='.$p) ?>"><?php echo $p; ?></a></li>
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
                            <a class="page-link" href="<?php echo base_url('admin/employers/view_all?page='.$p) ?>">
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
        