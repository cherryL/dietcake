<h1>All threads</h1>
<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>">Create</a>

<hr>
<ul>
    <?php foreach ($threads as $v): ?>
        <li>
            <a href="<?php eh(url('thread/view', array('thread_id' => $v->id))) ?>">
                <?php eh($v->title) ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>
<hr>

<div class="div-pagination">
    <div class="pagerfanta">
        <?php echo $html; ?>
    </div>
</div>



