<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
		//Get all Symfony Repositories hosted on GitHub
		$client 				= new \Github\Client();
		$arrRepos	 			= $client->api('repo')->find('symfony');
		
		$arrSymfonyRepos 		= array();
		if(!empty($arrRepos['repositories'])){
			$arrSymfonyRepos 	= $arrRepos['repositories'];
		}
		//echo '$arrSymfonyRepos = <pre>'; print_r($arrSymfonyRepos); exit;

        return $this->render('default/index.html.twig', ['arrSymfonyRepos' => $arrSymfonyRepos]);
    }
}
