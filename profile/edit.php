<?php

    require_once "../Layout/header.php";
    require_once "../assets/functions.php";
    
    if (!empty($_POST['choose'])) {
        $module->mid = $_POST['id'];
        $module->get (); //get module info
    } elseif (!empty($_POST['submit'])) {
        //Form Validation
        $module->mid = test_input($_POST['mid']);
        $module->name = test_input($_POST['name']);
        $module->background = test_input($_POST['background']);
        $module->fontColor = test_input($_POST['fontColor']);
        $module->edit ();
    }
    $list = $module->listAll();
?>

<!-- Title -->
<title>Edit Module</title>

<!-- Back Navigtion -->
<a href="interface.php" target="_self">Home</a>

<!-- Heading -->
<h1>Edit Module</h1>

<?php if (!empty($module->message)) : ?>
    <h3><?php echo $module->message; ?></h3>
<?php endif; ?>

<?php if (!empty($module->mid)) : ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <table>
        <!-- Hidden - Module ID -->
        <input type="hidden" name="mid" value="<?php echo $module->mid; ?>">
        
        <!-- Hidden - Module ID -->
        <input type="hidden" name="name" value="<?php echo $module->name; ?>">
        
        <!-- Background -->
        <tr>
            <td><b>Background:</b></td>
            <td><input type='color' required name="background" value="<?php echo !empty($module->background) ? $module->background : ''; ?>"><?php if (!empty($_POST['background'])) echo $_POST['background']; ?></td>
        </tr>
        
        <!-- Font Color -->
        <tr>
            <td><b>Font Color:</b></td>
            <td><input type='color' required name="fontColor" value="<?php echo !empty($module->fontColor) ? $module->fontColor : ''; ?>"><?php if (!empty($_POST['fontColor'])) echo $_POST['fontColor']; ?></td>
        </tr>
        
        <!-- Submit -->
        <tr>
            <td><input type="submit" name="submit"></td>
        </tr>
    </table>
</form>
<?php else: ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <table>
        <!-- Choose Module -->
        <tr>
            <td><b>Module:</b></td>
            <td><select required name="id">
                <?php foreach ($list as $m) : ?>
                    <option value="<?php echo $m["mid"]; ?>"><?php echo ucwords($m["name"]); ?></option>
                <?php endforeach; ?>
            </select></td>
        </tr>
        
        <!-- Submit -->
        <tr>
            <td><input type="submit" name="choose" value="Edit"></td>
        </tr>
    </table>
</form>
<?php endif; ?>