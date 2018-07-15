<?php

/* Copyright (C) AtlasNetworks <http://www.atlasxdn.com/> */

/**
 * @file /app/Middleware/PageConnectMiddleware.php
 * 
 * @brief 기본 home 경로를 설정하고, 연결될 js 파일 찾는다
 * 
 * @author 허정진
 * 
 */

namespace App\Middleware;

use App\Middleware\Middleware;

class PageConnectMiddleware extends Middleware
{
    protected $page_path;

    public function __invoke($request, $response, $next)
    {
        $page_path = $this->path = $request->getUri()->getPath();
        
		// method
		$this->setPagePath( $page_path );

		$this->getFolderName();

        $this->isJsFileExist();

        // next
        $response = $next($request, $response);

		return $response;
    }
	private function setPagePath( $page_path )
	{
        //var_dump( $page_path);
        //die();

		if( strcmp('/', $page_path) == 0 ){
            $page_path = '/'.$this->container->get('settings')['project']['homeFolderName'].'/'.$this->container->get('settings')['project']['homeFileName'];
        }

        $this->container->view->getEnvironment()->addGlobal('page_path', $page_path);

		$this->page_path = $page_path;
	}

	private function getFolderName()
	{
		$folderName = explode('/', $this->page_path)[1];
		$this->container->view->getEnvironment()->addGlobal('folderName', $folderName);
	}

    private function isJsFileExist()
    {
         $fileName = '../public/js'.$this->page_path.'.js';

         $this->container->view->getEnvironment()->addGlobal('isJsFileExist', file_exists($fileName) );
    }

}