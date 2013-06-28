<a href="<?php eh(url('thread/index')) ?>" class="btn btn-primary">Thread List</a>
<hr>

<h1><?php eh($thread->title) ?></h1>
<table>
<?php foreach ($comments['data'] as $k => $v): ?>
<div class="comment">
    <tr>
        <td><?php eh($k + 1) ?></td>
        <td><?php eh($v->username) ?></td>
        <td><?php eh($v->created) ?></td>
        <td><?php eh($v->body) ?></td>
        <td>
            <a href="<?php eh(url('thread/editComment', array('id' => $v->id, 'thread_id' => $v->thread_id))) ?>" class="btn btn-primary">Edit</a>
        </td>
    </tr>
</div>
<?php endforeach ?>
</table>

<hr>
<div class="div-pagination">
    <div class="pagerfanta">
        <?php echo $comments['html']; ?>
    </div>
</div>

<hr>
<form class="well" method="post" action="<?php eh(url('thread/write')) ?>">
    <label>Your name</label>
    <input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
    <label>Comment</label>
    <textarea name="body"><?php eh(Param::get('body')) ?></textarea>
    <br />
    <input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
    <input type="hidden" name="page_next" value="write_end">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
