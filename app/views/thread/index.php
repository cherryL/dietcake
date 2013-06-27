<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>">Create</a> |
<a class="btn btn-large btn-primary" href="<?php eh(url('registration/logoutAccount')) ?>">Logout</a>

<hr>
<h3>Thread List</h3>
<ul>
    <?php foreach ($threads['data'] as $v): ?>
        <li>
            <a href="<?php eh(url('thread/view', array('thread_id' => $v->id))) ?>"><?php eh($v->title) ?></a>
        </li>
    <?php endforeach ?>
</ul>
<hr>

<div class="div-pagination">
    <div class="pagerfanta">
        <?php echo $threads['html']; ?>
    </div>
</div>
