<?php

namespace test\V1Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use test\V1Bundle\Entity\User;
use test\V1Bundle\Entity\Image;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class VitrineController extends Controller
{
	public function indexAction(Request $request){
		$infoPersonnel = array(
			'nom' => 'Lozahic',
			'prenom' => 'Ronan'
			);

		$user = new User();

		/*$form = $this->get('form.factory')->createBuilder(FormType::class, $user)
			->add('firstname', TextType::class)
			->add('lastname', TextType::class)
			->add('password', TextType::class)
			->add('pseudo', TextType::class)
			->add('save',      SubmitType::class)
			->getform()
		;

		$form->handleRequest($request);

		if ($form->isValid()) {
	        // On enregistre notre objet $advert dans la base de données, par exemple
	        $em = $this->getDoctrine()->getManager();
	        $em->persist($user);
	        $em->flush();
	    } */

	    $emz = $this->getDoctrine()->getManager();
	    // Pour récupérer une seule annonce, on utilise la méthode find($id)
	    $userr = $emz->getRepository('testV1Bundle:User')->findAll();

		return $this -> render('testV1Bundle:Vitrine:index.html.twig', array(
			'infoPersonnel' => $infoPersonnel,
			/*'form' => $form->createview(),*/
			'user' => $userr
			));
	}

	public function travauxAction(){
		return $this -> render('testV1Bundle:Vitrine:travaux.html.twig', array(

		));
	}

	public function actuAction(){
		return $this -> render('testV1Bundle:Vitrine:actu.html.twig', array(

		));
	}

	public function inscriptionAction(){
		return $this -> render('testV1Bundle:Vitrine:inscription.html.twig', array(

		));
	}

	public function connexionAction(){
		return $this -> render('testV1Bundle:Vitrine:connexion.html.twig', array(

		));
	}

	public function adminAction(){
		return $this -> render('testV1Bundle:Vitrine:admin.html.twig', array(

		));
	}

	public function menuAction(){

		$listMenu = array(
			array('name' => 'Accueil', 'alt' => 'Lien Accueil', 'lien' => $this->generateUrl('accueil')),
			array('name' => 'Travaux', 'alt' => 'Lien vers mes travaux', 'lien' => $this->generateUrl('travaux')),
			array('name' => 'Actu', 'alt' => 'Lien vers les actualités', 'lien' => $this->generateUrl('actu')),
			array('name' => 'Inscription', 'alt' => 'Lien vers mes travaux', 'lien' => $this->generateUrl('inscription')),
			array('name' => 'Connexion', 'alt' => 'Lien vers mes travaux', 'lien' => $this->generateUrl('connexion')),
			array('name' => 'Admin', 'alt' => 'Lien vers mes travaux', 'lien' => $this->generateUrl('admin'))
			);

		return $this -> render('testV1Bundle:Vitrine:menu.html.twig', array('listMenu' => $listMenu));

	}





}