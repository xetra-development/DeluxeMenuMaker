<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      
    <title>DeluxeMenus Web UI</title>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link href="https://blackrockdigital.github.io/startbootstrap-bare/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
<head>
    
    
</head>
<style>
  #yaml {
  width : 50%;
  border : 1px solid #AAA;
  min-height: 700px;
  padding : 5px;
  margin-bottom : 10px;       
}
        
#drawing { 
border: 1px solid #555555; float:left; width:480px; height: 700px;
}   
</style>
    <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">DeluxeMenus Maker</a>
          <a class="navbar-brand" href="#">Very simple to use. Make your item, copy to your config, repeat.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li>
              <a class="nav-link" href="index.php">Full Menu
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
          
              <a class="nav-link" href="items.php">Items Only</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        
<textarea align="left" id="yaml" class="yaml" name="yaml">
items:
  '<?php echo htmlspecialchars($_POST['item_number']); ?>':
    material: <?php echo htmlspecialchars($_POST['material_name']); ?> &#013;
    slot: <?php echo htmlspecialchars($_POST['slot_number']); ?> &#013;
    display_name: '<?php echo htmlspecialchars($_POST['display_name']); ?>'
    lore:
    - '<?php echo htmlspecialchars($_POST['lore_text']); ?>'
    left_click_commands:
    - '<?php echo htmlspecialchars($_POST['left_click_command']); ?>'
    right_click_commands:
    - '<?php echo htmlspecialchars($_POST['right_click_command']); ?>'
        </textarea>
       <div style="display:inline-block">
<div id="drawing" style="text-align:left;padding:10px;overflow: scroll;height: 500px;position: absolute;top: 55px;">
        <form method="post" action="">
    Which item number is this? (1 would be the first item in the menu config, etc. THIS IS NOT FOR THE IN GAME SLOT.<br>
    <input type="text" name="item_number" value="<?= isset($_POST['item_number']) ? htmlspecialchars($_POST['item_number']) : '' ?>" /><br>
        
    What material would you like to use for this item? (For example: DIRT, STONE, WOOL)<br>
    <input type="text" name="material_name" value="<?= isset($_POST['material_name']) ? htmlspecialchars($_POST['material_name']) : '' ?>" /><br>
        
    What slot in the GUI will this go? (The first slot in the left corner is 0).<br>
    <input type="text" name="slot_number" value="<?= isset($_POST['slot_number']) ? htmlspecialchars($_POST['slot_number']) : '' ?>" /><br>

    What is the display name for this item?<br>
    <input type="text" name="display_name" value="<?= isset($_POST['display_name']) ? htmlspecialchars($_POST['display_name']) : '' ?>" /><br>
        
    What would you like the lore of this item to be?<br>
    <input type="text" name="lore_text" value="<?= isset($_POST['lore_text']) ? htmlspecialchars($_POST['lore_text']) : '' ?>" /><br>
        
    What would you like your left click command to be? (Usually [close]) (YOU NEED THE BRACKETS)<br>
    <input type="text" name="left_click_command" value="<?= isset($_POST['left_click_command']) ? htmlspecialchars($_POST['left_click_command']) : '' ?>" /><br>
        
    What would you like your right click command to be? (Default is [player] help) (YOU NEED THE BRACKETS)<br>
    <input type="text" name="right_click_command" value="<?= isset($_POST['right_click_command']) ? htmlspecialchars($_POST['right_click_command']) : '' ?>" /><br>
        
        
    <input type="submit" name="submit" />
        <br><br>
        
        Would you like to download this?
        <button type="button" value="save" id="save"> Save</button> 
  </form>
           </div>
</div>
<script>
    function saveTextAsFile()
        {
            var textToWrite = document.getElementById('yaml').value;
            var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
            var fileNameToSaveAs = "menu.yml";
        
            var downloadLink = document.createElement("a");
            downloadLink.download = fileNameToSaveAs;
            downloadLink.innerHTML = "Download File";
            if (window.webkitURL != null)
            {
                // Chrome allows the link to be clicked
                // without actually adding it to the DOM.
                downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
            }
            else
            {
                // Firefox requires the link to be added to the DOM
                // before it can be clicked.
                downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
                downloadLink.onclick = destroyClickedElement;
                downloadLink.style.display = "none";
                document.body.appendChild(downloadLink);
            }
        
            downloadLink.click();
        }
    
        var button = document.getElementById('save');
        button.addEventListener('click', saveTextAsFile);
</script>
    </body>