<?php

class Page extends AppModel
{
    public static function paging($data)
    {
        $page = Param::get('page', 1);
        $adapter = new \Pagerfanta\Adapter\ArrayAdapter($data);
        $paginator = new \Pagerfanta\Pagerfanta($adapter);
        $paginator->setMaxPerPage(1);
        $paginator->setCurrentPage($page);
        $paged_data['data'] = $paginator->getCurrentPageResults();

        $view = new \Pagerfanta\View\DefaultView();
        $options = array('proximity' => 3, 'url' => 'card/all');
        $paged_data['html'] = $view->render($paginator, 'routeGenerator', $options);

        return $paged_data;
    }
}