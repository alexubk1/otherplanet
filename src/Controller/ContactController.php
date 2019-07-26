<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Contact controller.
 *
 *
 */
class ContactController extends Controller
{
    /**
     * Lists all contact entities.
     *
     * @param Request $request posted info
     *
     * @Route          ("/contact",  name="contact_index")
     * @Method({"GET", "POST"})
     * @return         \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(
            'App\Form\ContactType', null, [
                // To set the action use $this->generateUrl('route_identifier')
                'action' => $this->generateUrl('contact_index'),
                'method' => 'POST',
            ]
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($this->_sendEmail($form->getData())) {
                $this->addFlash("success", "Votre message a bien été envoyé.");
                return $this->redirectToRoute('homepage');
            } else {
                throw $this->
                createNotFoundException('Erreur : L\'email n\'a pas pu s\'envoyer.');
            }
        }
        return $this->render(
            'contact/index.html.twig', [
                'form' => $form->createView()
            ]
        );
    }
    /**
     * Lists all contact entities.
     *
     * @param Request $request posted info
     *
     * @Route          ("/desinscription",  name="unsubscribe_index")
     * @Method({"GET", "POST"})
     * @return         \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function _unsubscribe(Request $request)
    {
        $unsubscribe = $this->createForm(
            'AppBundle\Form\ContactType', null, [
                // To set the action use $this->generateUrl('route_identifier')
                'action' => $this->generateUrl('unsubscribe_index'),
                'method' => 'POST',
            ]
        );
        $unsubscribe->remove('name');
        $unsubscribe->remove('subject');
        $unsubscribe->remove('message');
        $unsubscribe->handleRequest($request);
        if ($unsubscribe->isSubmitted() && $unsubscribe->isValid()) {
            if ($this->_UnsubscribeEmail($unsubscribe->getData())) {
                $this->addFlash("success", "Votre désinscription a bien été prise en compte");
                return $this->redirectToRoute('homepage');
            } else {
                throw $this->
                createNotFoundException('Erreur : La désinscription n\'a pas pu s\'envoyer.');
            }
        }
        return $this->render(
            'unsubscribe/index.html.twig', [
                'unsubscribe' => $unsubscribe->createView()
            ]
        );
    }
    /**
     * Creates email function for send newsletter.
     *
     * $data function to send email
     *
     * @param string int array $data function send email
     *
     * @return string int array
     */
    private function _sendEmail($data)
    {
        $message = (new \Swift_Message($data["subject"]))
            ->setFrom('alexandre.urbaniak01@gmail.com')
            ->setCharset('UTF-8')
            ->setTo($data['email'])
            ->setBody(
                $this->renderView(
                    'email/registration.html.twig',
                    [
                        'name'    => $data['name'],
                        'email'   => $data['email'],
                        'subject' => $data['subject'],
                        'message' => $data['message'],
                    ]
                ),
                'text/html'
            );
        return $this->get('mailer')->send($message);
    }
    /**
     * Creates email function for send newsletter.
     *
     * $data function to send email
     *
     * @param string int array $data function send email
     *
     * @return string int array
     */
    private function _UnsubscribeEmail($data)
    {
        $message = \Swift_Message('hello')
            ->setFrom($this->container->getParameter('mailer_user'))
            ->setCharset('UTF-8')
            ->setTo($this->container->getParameter('mailer_user'))
            ->setBody(
                $this->renderView(
                    'email/unsubscribe.html.twig',
                    [
                        'email' => $data['email'],
                    ]
                ),
                'text/html'
            );
        return $this->get('mailer')->send($message);
    }
}