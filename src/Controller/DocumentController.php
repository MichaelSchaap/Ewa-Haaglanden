<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Document;
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
use Symfony\Component\Filesystem\Filesystem;
use Gedmo\Sluggable\Util\Urlizer;

use Symfony\Component\HttpFoundation\File\UploadedFile;




/**
 * @Rest\Route("/api")
 */
final class DocumentController extends AbstractController
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
     * @Rest\Post("/admin/dashboard/document/create", name="createDocument", methods={"GET","POST"})
     */
    public function createAction(Request $request, \Swift_Mailer $mailer): JsonResponse
    {

        $name = $request->request->get('name');
        if (empty($name)) {
            throw new BadRequestHttpException('name cannot be empty');
        }

        $description = $request->request->get('description');
        if (empty($description)) {
            throw new BadRequestHttpException('description cannot be empty');
        }

        $file = $request->request->get('file');
      
        $document = new Document();
        $document->setName($name);
        $document->setDescription($description);

        define('UPLOAD_DIR', 'images/doc/');
        $document->setFile($file);
        $file = $document->getFile($file);
        $file = str_replace('data:application/pdf;base64,', '', $file);
        $file = str_replace(' ', '+', $file);
        $data = base64_decode($file);
        $unique = uniqid() . '.pdf';
        $read = UPLOAD_DIR . $unique;
        $success = file_put_contents($read, $data);
        $document->setFile($unique);
        
        $this->em->persist($document);
        $this->em->flush();
        $data = $this->serializer->serialize($document, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
    * @Rest\Get("/informatie", name="findAllDocuments")
    */
   public function findAllAction(): JsonResponse
   {
       $documents = $this->em->getRepository(Document::class)->findBy([], ['id' => 'DESC']);
       $data = $this->serializer->serialize($documents, JsonEncoder::FORMAT);

       return new JsonResponse($data, Response::HTTP_OK, [], true);
   }

   /**
    * @Rest\Get("/admin/dashboard", name="findAllDocuments2")
    */
   public function findAllAction2(): JsonResponse
   {
       $documents = $this->em->getRepository(Document::class)->findBy([], ['id' => 'DESC']);
       $data = $this->serializer->serialize($documents, JsonEncoder::FORMAT);

       return new JsonResponse($data, Response::HTTP_OK, [], true);
   }

   /**
    * @Rest\Post("/admin/dashboard/document/delete/{id}", name="deleteDocument", methods={"DELETE"})
     */
    public function delete(Request $request, $id): JsonResponse
    {

        $em = $this->getDoctrine()->getManager();
        $document = $em->getRepository(Document::class)->find($id);
        
        $filename = $document->getFile();

        $filesystem = new Filesystem();
        $filesystem->remove('images/doc/'.$filename);
        

        $em->remove($document);
        $em->flush();

        $data = $this->serializer->serialize($document, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }


    /**
     * @throws BadRequestHttpException
     *
     * @REST\RequestParam(name="name", description="document name", nullable=true)
     * @REST\RequestParam(name="description", description="document description", nullable=true)
     * @REST\RequestParam(name="file", description="document file", nullable=true)
     * @Rest\Post("/admin/dashboard/document/edit/{id}", name="editDocument", methods={"GET","PATCH"})
     */
    public function edit(ParamFetcher $paramFetcher, $id): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $document = $em->getRepository(Document::class)->find($id);

        $name = $paramFetcher->get('name');
        $description = $paramFetcher->get('description');
        $file = $paramFetcher->get('file');

        if (trim($name) !== '') {
            if ($document) {
                $document->setName($name); 
            }
        }

        if (trim($description) !== '') {
            if ($document) {
                $document->setDescription($description); 
            }
        }

        if (trim($file) !== '') {
            if ($document) {
                define('UPLOAD_DIR', 'images/doc/');
                $document->setFile($file);
                $file = $document->getFile($file);
                $data = base64_decode($file);
                $read = UPLOAD_DIR . $file;
                $success = file_put_contents($read, $data);
                $document->setFile($file);
            }
        }

        $this->em->persist($document);
        $this->em->flush();

        $data = $this->serializer->serialize($document, JsonEncoder::FORMAT);
        
        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    
    }

   
   
}
