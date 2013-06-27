<?php

class ThreadController extends AppController
{
    public function index()
    {
        if(!isset($_SESSION['user_id'])){
            header('location: /registration/loginAccount');
        }

        $data_per_page = 10;
        $threads = Thread::getAll();

        $threads = Page::paging($threads, $data_per_page);

        $this->set(get_defined_vars());
    }

    public function view()
    {
        $data_per_page = 3;

        $thread = Thread::get(Param::get('thread_id'));
        $comments = $thread->getComments();

        $comments = Page::paging($comments, $data_per_page);

        $this->set(get_defined_vars());
    }

    public function write()
    {
        $thread = Thread::get(Param::get('thread_id'));
        $comment = new Comment;
        $page = Param::get('page_next');
        switch ($page) {
            case 'write':
                break;
            case 'write_end':
                $comment->username = Param::get('username');
                $comment->body = Param::get('body');
                try {
                    $thread->write($comment);
                } catch (ValidationException $e) {
                    $page = 'write';
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }

        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function create()
    {
        $thread = new Thread;
        $comment = new Comment;
        $page = Param::get('page_next', 'create');

        switch ($page) {
            case 'create':
                break;
            case 'create_end':
                $thread->title = Param::get('title');
                $comment->username = Param::get('username');
                $comment->body = Param::get('body');
                try {
                    $thread->create($comment);
                } catch (ValidationException $e) {
                    $page = 'create';
                }
                break;
            default:
                throw new NotFoundException("{$page} is not found");
                break;
        }

        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function editComment()
    {
        $comment = new Thread();
        $row = $comment->getCommentById(Param::get('id'));

        if(Param::get('edit')){
            $data = array(
                'username' => Param::get('username'),
                'body' => Param::get('body')
            );
            $where = array('id' => Param::get('id'));

            $comment = new Thread();
            $comment->updateComment($data, $where);

            header('location:'.url('thread/view', array('thread_id' => Param::get('thread_id'))));
        }

        $this->set(get_defined_vars());
    }
}