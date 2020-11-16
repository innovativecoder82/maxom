<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "u607487318_maxmo");
$columns = array('date', 'emp_name', 'cust_name', 'project_interest', 'cust_first_meeting', 'cust_second_meeting', 'cust_sitevisit_meeting', 'next_action', 'next_action_date');

$query = "SELECT * FROM customer_details WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (date LIKE "%'.$_POST["search"]["value"].'%" 
  
  OR emp_name LIKE "%'.$_POST["search"]["value"].'%" 
  OR cust_name LIKE "%'.$_POST["search"]["value"].'%" 
  OR project_interest LIKE "%'.$_POST["search"]["value"].'%"
  OR cust_first_meeting LIKE "%'.$_POST["search"]["value"].'%"
  OR cust_second_meeting LIKE "%'.$_POST["search"]["value"].'%"
  OR cust_sitevisit_meeting LIKE "%'.$_POST["search"]["value"].'%"
  OR next_action LIKE "%'.$_POST["search"]["value"].'%"
  OR next_action_date LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 
 $sub_array[] = $row["date"];
 $sub_array[] = $row["emp_name"];
 $sub_array[] = $row["cust_name"];
 $sub_array[] = $row["project_interest"];
 $sub_array[] = $row["cust_first_meeting"];
 $sub_array[] = $row["cust_second_meeting"];
 $sub_array[] = $row["cust_sitevisit_meeting"];
 $sub_array[] = $row["next_action"];
 $sub_array[] = $row["next_action_date"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM customer_details";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>

