<?php
$error = false;
$cname = "";
if(isset($_POST["company_name"]))
{
    $cname = $_POST["company_name"];
    $cid = $_POST["cid"];
    $query = $conx->query("UPDATE company SET company_name='$cname' WHERE company_id='$cid'");
    $updateed = false;
    if($query && mysqli_affected_rows($conx)>0)
    {
        header("location: companies");
    }
}

if(isset($_GET["cid"]))
{
    $cid = $_GET["cid"];
}else
{
    header("location: ./companies");
}

$query = $conx->query("SELECT * FROM company WHERE company_id='$cid'");

if($query && $query->num_rows>0)
{
    $company_data = mysqli_fetch_array($query);
}else
{
    $error = true;
}
?><h1>Update Company</h1>
<?php
if(isset($_POST["company_name"]))
{
    if($updateed){
?>
<div class="alert alert-success"><b><?= $cname;?></b> Updated To Database</div>
<?php
                 }else
    {
?>
<div class="alert alert-success"><b><?= $cname;?></b> Failed To update to Database</div>
<?php
    }
}


if($error)
{
    echo "<div class='alert alert-danger'>Content Not found of ID='$cid'</div>";
}else
{

?>
<div class="space-6"></div>
<form class="form-horizontal form-actions" role="form" method="POST" id="company_update_form">
    <div class="form-group">
        <input type="hidden" name="cid" value="<?= $cid;?>">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>
        <div class="col-sm-9">
            <input name="company_name" type="text" id="form-field-1" placeholder="Company Name" class="col-xs-10 col-sm-5" value="<?= $company_data["company_name"];?>">
        </div>
    </div>
    <div class="clearfix ">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info">
                <i class="ace-icon fa fa-check bigger-110"></i>
                update
            </button>
        </div>
    </div>
</form>
<?php
}

?>