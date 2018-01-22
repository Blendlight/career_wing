/**
* Company add
*/

/*$company_add_form = $("#company_add_form");

$company_add_form.on("submit", function(e){
    e.preventDefault();
    alert("Submited");
})*/

$alerts = $("#alerts");

$add_worker_input_company = $("#add_worker-input_company");
$add_worker_input_job = $("#add_worker-input_job");
job_option = "<option value=\"\">--Job--</option>";

$btns_delete = $(".btn-delete");

$btns_delete.on("click", function(evt){
    evt.preventDefault();
    if(1){
        var choice = confirm("Do you want to delete this record");

        if(!choice)
        {
            return;
        }
    }
    var $this = $(this);
    var id = $this.attr("data-id");
    var table = $this.attr("data-table")

    $.ajax({
        "type":"POST",
        "url":"ajax.php",
        "data":`request=delete&id=${id}&table=${table}`,
        success:function(data)
        {
            var data = JSON.parse(data);
            var success = data.success;
            if(success==true)
            {
                var tr = $this.closest("tr");
                tr.hide();
                add_alert("success", "Record deleted successfully");
            }else
            {

            }
        },
        error:function()
        {

        }
    });
})


$add_worker_input_company.on("change", function(evt){
    value = this.value;
    if(value)
    {
        $.ajax({
            type:"POST",
            url:"ajax.php",
            data:"request=select_jobs&company_id="+value,
            success:function(data)
            {
                var jdata = JSON.parse(data);
                var success = jdata.success;
                var result = jdata.result;
                if(success=="true")
                {
                    $add_worker_input_job.removeAttr("disabled");
                    $add_worker_input_job.html(result);
                }else
                {
                    reset_add_worker_job();
                }

            },
            error:function()
            {

            }
        });
    }else
    {
        reset_add_worker_job();
    }
});

function reset_add_worker_job()
{
    $add_worker_input_job.attr("disabled",true);
    $add_worker_input_job.html(job_option);
}

function add_alert(type='info', msg='')
{
    $alerts.append(`<div class="alert alert-${type}">${msg}<div class="close" data-dismiss="alert">&times;</div></div>`);
}

$(".inp").on("keyup", function(evt){
//    var value = this.value;
//    replace  = value.replace(/[^0-9]/ig, "");
//    this.value = replace;
});
