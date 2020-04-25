<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;



use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\FileParam;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;




/**
 * @Rest\Route("/api")
 */
final class ContactController extends AbstractController
{
    private EntityManagerInterface $em;

    private SerializerInterface $serializer;

    public function __construct(EntityManagerInterface $em, SerializerInterface $serializer)
    {
        $this->em = $em;
        $this->serializer = $serializer;
    }

    /**
     * @throws BadRequestHttpException
     *
     * @Rest\Post("/home", name="createContact", methods={"GET","POST"})
     */
    public function createAction(Request $request): JsonResponse
    {

        $name = $request->request->get('name');
        if (empty($name)) {
            throw new BadRequestHttpException('name cannot be empty');
        }

        $email = $request->request->get('email');
        if (empty($email)) {
            throw new BadRequestHttpException('email cannot be empty');
        }

        $subject = $request->request->get('subject');
        if (empty($subject)) {
            throw new BadRequestHttpException('subject cannot be empty');
        }

        $message = $request->request->get('message');
        if (empty($message)) {
            throw new BadRequestHttpException('message cannot be empty');
        }

        $subscribed = $request->request->get('subscribed');
        


        $contact = new Contact();
        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setSubject($subject);
        $contact->setMessage($message);
        $contact->setSubscribed($subscribed);
        
        $this->em->persist($contact);
        $this->em->flush();
        $data = $this->serializer->serialize($contact, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Get("/admin/dashboard", name="findAllContacts")
     */
    public function findAllAction(): JsonResponse
    {
        $contacts = $this->em->getRepository(Contact::class)->findBy(['subscribed' => true,]);
        $data = $this->serializer->serialize($contacts, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

   
}
