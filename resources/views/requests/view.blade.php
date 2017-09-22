@extends('layouts.app') @section('content')

<section class="content-header">
    <h1>
        View Request
    </h1>

</section>
<section class="content">
    <!-- left column -->
    <div class="col-lg-10 col-lg-offset-1">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Request Details</h3>
            </div>
            <div class="row">
                <div class="col-sm-3">CRM case no</div>
                <div class="col-sm-9"><?php print_r($crmreq->crm_case); ?></div>
            </div>
            <?php echo ($var)->format('m/d/Y H:i'); ?>
    </div>
</section>

@endsection