<?php

class Page extends AppModel
{
    public static function paging($data, $data_per_page)
    {
        $page = Param::get('page', 1);
        $adapter = new \Pagerfanta\Adapter\ArrayAdapter($data);
        $paginator = new \Pagerfanta\Pagerfanta($adapter);
        $paginator->setMaxPerPage($data_per_page);
        $paginator->setCurrentPage($page);
        $paged_data['data'] = $paginator->getCurrentPageResults();

        $view = new \Pagerfanta\View\DefaultView();
        $options = array('proximity' => 3, 'url' => 'card/all');
        $paged_data['html'] = $view->render($paginator, 'routeGenerator', $options);

        return $paged_data;
    }
}