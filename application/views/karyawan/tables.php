<?php
class DBController
{
    private $conn = "";
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "blog_samples";

    function __construct()
    {
        $conn = $this->connectDB();
        if (!empty($conn)) {
            $this->conn = $conn;
        }
    }

    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    function runSelectQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }

    function executeInsert($query)
    {
        $result = mysqli_query($this->conn, $query);
        $insert_id = mysqli_insert_id($this->conn);
        return $insert_id;
    }
    function executeUpdate($query)
    {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function executeQuery($sql)
    {
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    function numRows($query)
    {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>


<!-- Add.php -->
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if (!empty($_POST["title"])) {
    $title = mysql_real_escape_string(strip_tags($_POST["title"]));
    $description = mysql_real_escape_string(strip_tags($_POST["description"]));
    $sql = "INSERT INTO posts (post_title,description) VALUES ('" . $title . "','" . $description . "')";
    $faq_id = $db_handle->executeInsert($sql);
    if (!empty($faq_id)) {
        $sql = "SELECT * from posts WHERE id = '$faq_id' ";
        $posts = $db_handle->runSelectQuery($sql);
    }
?>
    <tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
        <td contenteditable="true" onBlur="saveToDatabase(this,'post_title','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["post_title"]; ?></td>
        <td contenteditable="true" onBlur="saveToDatabase(this,'description','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["description"]; ?></td>
        <td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
    </tr>
<?php } ?>

<!-- End add.php -->

<!-- Edit.php -->
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "UPDATE posts set " . $_POST["column"] . " = '" . $_POST["editval"] . "' WHERE  id=" . $_POST["id"];
$result = $db_handle->executeUpdate($sql);
?>

<!-- End edit.php -->

<!-- Delete.php -->
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM  posts WHERE id = '$id' ";
    $db_handle->executeQuery($sql);
}
?>
<!-- End delete.php -->


<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT * from posts";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
    function createNew() {
        $("#add-more").hide();
        var data = '<tr class="table-row" id="new_row_ajax">' +
            '<td contenteditable="true" id="txt_title" onBlur="addToHiddenField(this,\'title\')" onClick="editRow(this);"></td>' +
            '<td contenteditable="true" id="txt_description" onBlur="addToHiddenField(this,\'description\')" onClick="editRow(this);"></td>' +
            '<td><input type="hidden" id="title" /><input type="hidden" id="description" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +
            '</tr>';
        $("#table-body").append(data);
    }



    function editRow(editableObj) {
        $(editableObj).css("background", "#FFF");
    }

    function addToHiddenField(addColumn, hiddenField) {
        var columnValue = $(addColumn).text();
        $("#" + hiddenField).val(columnValue);
    }

    function cancelAdd() {
        $("#add-more").show();
        $("#new_row_ajax").remove();
    }

    function addToDatabase() {
        var title = $("#title").val();
        var description = $("#description").val();

        $("#confirmAdd").html('<img src="loaderIcon.gif" />');
        $.ajax({
            url: "add.php",
            type: "POST",
            data: 'title=' + title + '&description=' + description,
            success: function(data) {
                $("#new_row_ajax").remove();
                $("#add-more").show();
                $("#table-body").append(data);
            }
        });
    }

    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFF url(loaderIcon.gif) no-repeat right");
        $.ajax({
            url: "edit.php",
            type: "POST",
            data: 'column=' + column + '&editval=' + $(editableObj).text() + '&id=' + id,
            success: function(data) {
                $(editableObj).css("background", "#FDFDFD");
            }
        });
    }

    function deleteRecord(id) {
        if (confirm("Are you sure you want to delete this row?")) {
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: 'id=' + id,
                success: function(data) {
                    $("#table-row-" + id).remove();
                }
            });
        }
    }
</script>

<style>
    body {
        width: 615px;
    }

    .tbl-qa {
        width: 98%;
        font-size: 0.9em;
        background-color: #f5f5f5;
    }

    .tbl-qa th.table-header {
        padding: 5px;
        text-align: left;
        padding: 10px;
    }

    .tbl-qa .table-row td {
        padding: 10px;
        background-color: #FDFDFD;
    }

    .ajax-action-links {
        color: #09F;
        margin: 10px 0px;
        cursor: pointer;
    }

    .ajax-action-button {
        border: #094 1px solid;
        color: #09F;
        margin: 10px 0px;
        cursor: pointer;
        display: inline-block;
        padding: 10px 20px;
    }
</style>

<table class="tbl-qa">
    <thead>
        <tr>
            <th class="table-header">Title</th>
            <th class="table-header">Description</th>
            <th class="table-header">Actions</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php
        if (!empty($posts)) {
            foreach ($posts as $k => $v) {
        ?>
                <tr class="table-row" id="table-row-<?php echo $posts[$k]["id"]; ?>">
                    <td contenteditable="true" onBlur="saveToDatabase(this,'post_title','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["post_title"]; ?></td>
                    <td contenteditable="true" onBlur="saveToDatabase(this,'description','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["description"]; ?></td>
                    <td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["id"]; ?>);">Delete</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
<div class="ajax-action-button" id="add-more" onClick="createNew();">Add More</div>