<?php
include "settings.php";

$result = [];

if(isset($_POST["request"]))
{
    $request = $_POST["request"];
    switch($request)
    {
        case "select_jobs":
            $company_id = $_POST["company_id"];
            $query = $conx->query("SELECT * FROM job WHERE company_id='$company_id'");
            if($query->num_rows>0){
                $result["success"] = "true";
                $result["result"] = select_options("jobs",null, "company_id='$company_id'");
            }else
            {
                $result["success"] = "false";
                $result["result"] = "";
            }
            break;
        case "select_agents":
            $company_id = $_POST["company_id"];
            $query = $conx->query("SELECT * FROM agent WHERE company_id='$company_id'");
            if($query->num_rows>0){
                $result["success"] = "true";
                $result["result"] = select_options("agent",null, "company_id='$company_id'");
            }else
            {
                $result["success"] = "false";
                $result["result"] = "";
            }
            break;
        case "delete":

            $id = $_POST["id"];
            $table = $_POST["table"];
            $result["success"] = delete_row($id, $table);
            break;
    }

    $output = json_encode($result);
    echo  $output;
}