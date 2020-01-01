<style type="text/css">
.movable-placeholder {
        background: #ccc;
        width: 400px;
        height: 100px;
        display: block;
        padding: 20px;
        margin: 0 0 15px 0;
        border-style: dashed;
        border-width: 2px;
        border-color: #000;
    }
.option_list {
    min-height: 150px;
    background-color: #ccc;    
    margin-bottom: 5px;
}    
</style>
<link rel="stylesheet" type="text/css" href="<?= ASSET; ?>css/form_style.css">
<link href="<?= ASSET; ?>js/signature/jquery.signaturepad.css" rel="stylesheet">
<div class="content-wrapper">   
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="text-left">
                            <a href="<?= site_url('AuditForms') ?>" class="btn text-semibold text-white"><i class="icon-arrow-left52"></i></a>
                        </h2>
                    </div>
                    <div class="col-md-4 text-center">
                        <h1 class="text-center"><span class="text-semibold text-white"><?= $title; ?></span></h1>
                    </div>
                </div>
            </div>
            <!-- <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="<?= site_url('auditForms') ?>" class="btn text-semibold text-white"><i class="icon-arrow-left52"></i></a>
                </div>
            </div>   -->
        </div>
    </div>
    <div class="content">
        <div class="panel panel-flat">
            <!--<div class="panel-heading">
                <h5 class="panel-title"><?= $title; ?><a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                <hr>
            </div> -->
            <div class="panel-body">
                <div class="row">                   
                    <div class="col-lg-12">
                        <?php if(validation_errors() != false) { ?>
                        <div class="alert alert-danger alert-styled-left alert-bordered">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <?php $frm_attr = array("id"=>"frm_form", 'class' => 'steps-validation');
                echo form_open_multipart($url, $frm_attr); ?>
                    <!-- <h6>Form Information</h6> -->
                    <fieldset>
                        <h6 class="text-semibold">                            
                            Form Information
                            <!-- <small class="display-block">Add Basics</small> -->
                        </h6>                
                        <div class="row">
                            <div class="col-md-7 col-lg-7 col-sm-12">                                
                                <div class="form-group clearfix">
                                    <label class="control-label col-lg-2 col-md-2 col-sm-12">Form Title<span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-md-8 col-sm-12">                                        
                                        <input type="text" class="form-control required" id="form_title" placeholder="Enter Form Title" name="form_title" value="<?php if(isset($form['form_title'])) echo $form['form_title']; elseif (isset($_POST['form_title'])) echo $_POST['form_title'];?>">
                                    </div>
                                </div>                                
                                <div class="form-group clearfix">
                                    <label class="control-label col-lg-2 col-md-2 col-sm-12">Type <span class="text-danger">*</span></label>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <select class="form-control required" name="form_type_id" id="form_type_id">
                                            <option value="">-Select Form Type-</option>
                                            <?php if(isset($ftype) && sizeof($ftype) > 0):
                                                    foreach ($ftype as $type):
                                                        $selected = "";
                                                        if(isset($form['form_type_id']) && in_array($type['id'], explode(',', $form['form_type_id']))): 
                                                            $selected = "selected";
                                                        endif; ?>
                                                        <option value="<?= $type['id'] ?>" <?= $selected ?>><?= $type['form_type_name']; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                        </select>
                                        <input type="hidden" name="record" value="<?php if(isset($form['id'])) echo $form['id']; else echo 0;?>" id="edit_id" />
                                        <div class="text-danger"><?= form_error('form_type_id'); ?></div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <hr>                           
                    </fieldset>
                    <!-- <h6 class="design_form hide">Design Form</h6>                     -->
                    <fieldset class="design_form hide">    
                        <h6 class="form-wizard-title text-semibold">
                            <!-- <span class="form-wizard-count icon-printer4"></span>
                            <small class="display-block">click to add form filed</small> -->
                            Design Form
                        </h6>
                        <div class="row">                            
                            <div class="col-xs-4 col-md-4 col-lg-3 left_panel" id="tool_bar">
                                <div  class="add_content_block">
                                    <div>
                                        <a href="javascript:addElement('section');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="glyphicon glyphicon-blackboard"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Section</h6>
                                                        <small class="text-muted text-default">Section</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('title');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-flag7"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add Title/Heading</h6>
                                                        <small class="text-muted text-default">Add Title and Description</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('text');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-question3"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add Short Answer Question</h6>
                                                        <small class="text-muted text-default">Add Text input box</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                                    
                                    <div>
                                        <a href="javascript:addElement('checkbox');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-checkbox-checked"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add Check Box Question</h6>
                                                        <small class="text-muted text-default">Add Check box</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                                    
                                    <div>
                                        <a href="javascript:addElement('radio');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class=" icon-radio-checked"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add Multi Choice Question</h6>
                                                        <small class="text-muted text-default">Add Yes/No options</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('image');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-image5"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add Image</h6>
                                                        <small class="text-muted text-default">Browse Image file</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('file');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-profile"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add File Upload</h6>
                                                        <small class="text-muted text-default">Browse Document of File</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('long_text');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-font-size"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add Long Text</h6>
                                                        <small class="text-muted text-default">Add paragraph of text</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('line_break');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-pagebreak"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Line Break</h6>
                                                        <small class="text-muted text-default">Add line break</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('sign_pad');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-pen"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Add Signature</h6>
                                                        <small class="text-muted text-default">Users will be required to sign this form</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="javascript:addElement('demonstrate');">
                                            <div class="panel panel-body bg-gray">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="glyphicon glyphicon-blackboard"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">Upload Image/Document</h6>
                                                        <small class="text-muted text-default">To Demonstrate content</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8 col-lg-9 right_panel">
                                <div id="sort" class="option_list_table"><ul class="list-unstyled option_list" id='sec_0'><i class='icon-grid6 drag_me'></i></ul></div>
                            </div>
                            <div class="col-xs-8 col-sm-9 col-md-8 col-lg-9 ">
                                <div id="preview_list"></div>
                                <input type="text" name="active_sec" id="active_sec" value="sec_0">
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="text-right col-lg-12 col-md-12 col-sm-12">
                                <a class="btn btn-info preview" href="javascript:preview_form();" data-item="forms" role="menuitem"><i class="icon-eye"></i> Preview</a>
                                <a href="#cancel" class="btn btn-warning" data-item="auditForms" role="menuitem">Cancel</a>
                                <input type="submit" class="btn btn-success" name="Submit" value="Finish">                                
                            </div>
                        </div>
                        <hr>
                    </fieldset>                                               
                <?php echo form_close(); ?>
            </div>
        </div>
        <?php $this->load->view('Templates/footer'); ?>
    </div>
</div>
<div id="lv_preview" class="modal fade in">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5 class="modal-title" ></h5>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="<?= ASSET; ?>js/plugins/forms/wizards/steps.min.js"></script> -->
<!-- <script type="text/javascript" src="<?= ASSET; ?>js/pages/wizard_steps.js"></script> -->
<script type="text/javascript" src="<?= ASSET; ?>js/plugins/forms/validation/validate.min.js"></script>
<script type="text/javascript" src="<?= ASSET; ?>js/plugins/forms/validation/additional_methods.min.js"></script>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<script src="<?= ASSET; ?>js/pages/jquery-ui.js"></script>
<script type="text/javascript" src='<?= ASSET; ?>js/core/libraries/jquery_ui/touch.min.js'></script>
<script type="text/javascript" src="<?= ASSET ?>scripts/forms.js"></script>
<script src="<?= ASSET; ?>js/signature/numeric-1.2.6.min.js"></script> 
<script src="<?= ASSET; ?>js/signature/bezier.js"></script>
<script type="text/javascript" src="<?= ASSET; ?>js/signature/jquery.signaturepad.js"></script>



