<h1>Edit a thread</h1>

<form class="well" method="post" action="<?php eh(url('')) ?>">
    <label>Your name</label>
    <input type="text" class="span2" name="username" value="<?php echo $row->username; ?>">
    <label>Comment</label>
    <textarea name="body"><?php echo $row->body; ?></textarea>
    <br />
    <input type="hidden" name="page_next" value="create_end">
    <input type="submit" class="btn btn-primary" value="Submit" name="edit">
    <a href="<?php eh(url('thread/view', array('thread_id' => Param::get('thread_id'))))?>" class="btn btn-primary">Back</a>
</form>
