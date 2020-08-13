<h1><?php echo($heading) ?></h1>
<form method="post" action="/blog/create/index">
    <!-- <input type="hidden" value="" name="csrf"> -->
    <label for="title">Title</label>
    <input type="text" id="title" name="title">
    <label for="content">Content</label>
    <textarea name="content" id="content"></textarea>
    <br>
    <input type="submit">
</form>
</div>
					</div>