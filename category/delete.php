<?php
    require_once "../Layout/header.php";
    require_once "../assets/functions.php";
    
    if (!empty($_POST['submit'])) {
        $category->id = $_POST['id'];
        $category->delete();
    }
    $list = $category->listAll();
    
?>
    
<!-- Title -->
<title>Delete Category</title>

<!-- Back Navigtion -->
<a href="interface.php" target="_self">Home</a>

<!-- Heading -->
<h1>Delete Category</h1>

<?php if (!empty($category->message)) : ?>
    <h3><?php echo $category->message; ?></h3>
<?php endif; ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <table>
        <!-- category -->
        <tr>
            <td><b>Category:</b></td>
            <td><select required name="id">
                <?php foreach ($list as $c) : ?>
                    <option value="<?php echo $c["cid"]; ?>"><?php echo $c["name"]; ?></option>
                <?php endforeach; ?>
            </select></td>
        </tr>
        
        <!-- Submit -->
        <tr>
            <td><input type="submit" name="submit" value="Delete" onclick="confirm('Are you sure you want to delete this category?');"></td>
        </tr>
    </table>
</form>