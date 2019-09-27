@extends('layouts.app')
@section('page_title', 'City')

@section('header')
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2/select2.css">
@endsection
@section('content')
    <div class="page-inner">
        <div class="page-section">
            <div id="base-style" class="card">
                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form -->
                <?php
                $data  = [
                    'class' => 'null'
                ];
                echo form_open('admin/city/update',$data);
                ?>
                <!-- .fieldset -->
                    <fieldset>
                        <legend>City</legend>

                        @if(!empty(validation_errors()))
                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo validation_errors(); ?></strong>
                                </div>
                            </div>
                        @endif

                        <input type="hidden" class="form-control" name="id" autocomplete="off" value="<?= $model->id ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tf1">Name</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off" value="<?= $model->name ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label  for="selDefault">Province</label>
                                    <select name="province_id" class="custom-select js-example-basic-single">
                                        <option value="" selected="selected">Select Province</option>
                                        <?php
                                        foreach ($models as $data) {
                                            echo "<option value='$data->id'";
                                            echo $model->province_id == $data->id ? 'selected': '';
                                            echo ">$data->name </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tf1">Code</label>
                                    <input type="text" class="form-control" name="code" autocomplete="off" value="<?= $model->code ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tf1">BSNI</label>
                                    <input type="text" class="form-control" name="bsni" autocomplete="off" value="<?= $model->bsni ?>">
                                </div>
                            </div>
                        </div>

                        <div class="publisher-actions">
                            <!-- .publisher-tools -->
                            <div class="publisher-tools mr-auto">
                            </div>
                            <!-- /.publisher-tools -->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </fieldset>
                    <?php echo form_close();?>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-single").select2();
        });
    </script>
@endsection