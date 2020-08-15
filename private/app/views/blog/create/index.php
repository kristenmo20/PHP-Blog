<h1><?php echo($heading) ?></h1>
<form method="post">
    <input type="hidden" value="" name="csrf">
    <input type="hidden" value="<?php echo($title); ?>" name="key">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" <?php if ($title != "") {echo("value=\"$title\"");}?>>
    <label for="content">Content</label>
    <textarea name="content" id="content" <?php if ($content != "") {echo($content);}?>></textarea>
    <br>
    <input type="submit">
</form>
</div>
					</div>