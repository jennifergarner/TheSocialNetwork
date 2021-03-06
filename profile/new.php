<?php

    require_once "../Layout/header.php";
    require_once "../assets/functions.php";
    
    if (!empty($_POST['submit'])) {
        $module->name = test_input($_POST['name']);
        $module->location = test_input($_POST['location']);
        $module->background = test_input($_POST['background']);
        $module->fontColor = test_input($_POST['fontColor']);
        $module->create ();
    }
?>

<!-- Title -->
<title>New Module</title>

<body style="padding-top:70px">
<?php nav_bar(); ?>

<!-- Back Navigtion -->
<button type="button" class="left btn btn-primary" onclick="window.location.href='interface.php'">Modules</button>

<!-- Heading -->
<h1>New Module</h1>

<?php if (!empty($module->message)) : ?>
    <h3><?php echo $module->message; ?></h3>
<?php endif; ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
    <div class='form'>
        <table>
            <!-- Name -->
            <tr>
                <td><b>Module:</b></td>
                <td><select name='name'>
                    <option value='about me'>About Me</option>
                    <option value='contact'>Contact</option>
                    <option value='posts'>Posts</option>
                </select></td>
            </tr>
            
            <!-- Location -->
            <tr>
                <td><b>Location:</b></td>
                <td><select name='location'>
                    <option value='top left'>Top Left</option>
                    <option value='top right'>Top Right</option>
                </select></td>
            </tr>
            
            <!-- Background -->
            <tr>
                <td><b>Background:</b></td>
                <td><input type='color' required name="background"><?php printPost('background'); ?></td>
            </tr>
            
            <!-- Font Color -->
            <tr>
                <td><b>Font Color:</b></td>
                <td><input type='color' required name="fontColor"><?php printPost('fontColor'); ?></td>
            </tr>
        </table>
    </div>
    <!-- Submit -->
    <button class="btn btn-success" type="submit" name="submit" value="submit">Submit</button>
</form>
