<?php

session_start();

class ThreadController extends AppController
{
    public function index()
    {
        if(!isset($_SESSION['user_id'])){
            header('location: /registration/loginAccount');
        }

        $threads = Thread::getAll();

        $adapter = new \Pagerfanta\Adapter\ArrayAdapter($threads);
        $paginator = new \Pagerfanta\Pagerfanta($adapter);
        $paginator->setMaxPerPage(1);
        $paginator->setCurrentPage(Param::get('page', 1));
        $threads = $paginator->getCurrentPageResults();

        $view = new \Pagerfanta\View\DefaultView();
        $options = array('proximity' => 3, 'url' => 'card/all');
        $html = $view->render($paginator, 'routeGenerator', $options);

        $this->set(get_defined_vars());
    }

    public function view()
    {
        $thread = Thread::get(Param::get('thread_id'));
        $comments = $thread->getComments();
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
}
