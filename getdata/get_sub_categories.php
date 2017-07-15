<?php
error_reporting(0);
include "../config/connection.php";

$category = $_GET['category'];

$querySubCategory = "SELECT * FROM as_sub_categories WHERE categoryID = '$category' AND status = 'Y' ORDER BY subCategoryName ASC";
$sqlSubCategory = mysqli_query($connect, $querySubCategory);
$numsSubCategory = mysqli_num_rows($sqlSubCategory);

if ($numsSubCategory > 0)
{
	echo "<option value='' SELECTED></option>";
}
else
{
	echo "<option value='0'>None</option>";
}
while ($dtSubCategory = mysqli_fetch_array($sqlSubCategory))
{
	echo "<option value='$dtSubCategory[subCategoryID]'>&nbsp;$dtSubCategory[subCategoryName]</option>";
}
?>