<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
	private $nom = 'Ronan';

		public function indexAction()
		{
		$content = $this
			->get('templating')
			->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => $this->nom));

		return new Response($content);
		}

		public function viewAction($id, Request $request){

			$tag = $request->query->get('tag');
	        
	        return new Response("Le tag est : ".$tag);
		}
		public function viewSlugAction($year, $slug, $format)
		{
			return new Response(            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$format.".");
		}
		
}