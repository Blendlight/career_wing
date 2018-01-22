<?php
$cname = "";
if(isset($_POST["company_name"]))
{
    $cname = $_POST["company_name"];
    $query = $conx->query("INSERT INTO company set company_name='$cname'");
    $added = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        $added = true;
    }
}
?><h1>Add Company</h1>
<?php
if(isset($_POST["company_name"]))
{
    if($added){
?>
<div class="alert alert-success"><b><?= $cname;?></b> Added To Database</div>
<?php
              }else
    {
?>
<div class="alert alert-success"><b><?= $cname;?></b> Failed To add to Database</div>
<?php
    }
}

?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST" id="company_add_form">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>
        <div class="col-sm-9">
            <input name="company_name" type="text" id="form-field-1" placeholder="Company Name" class="col-xs-10 col-sm-5">
        </div>
    </div>
    <div class="clearfix ">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Add
            </button>
        </div>
    </div>
</form>