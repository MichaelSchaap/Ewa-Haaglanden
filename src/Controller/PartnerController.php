<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Partner;
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




/**
 * @Rest\Route("/api")
 */
final class PartnerController extends AbstractController
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
     * @Rest\Post("/admin/dashboard/partner/create", name="createPartner", methods={"GET","POST"})
     */
    public function createAction(Request $request, \Swift_Mailer $mailer): JsonResponse
    {

        $name = $request->request->get('name');
        if (empty($name)) {
            throw new BadRequestHttpException('name cannot be empty');
        }

        $website = $request->request->get('website');
        if (empty($website)) {
            throw new BadRequestHttpException('website cannot be empty');
        }

        $img = $request->request->get('img');
        if (empty($img)) {
            throw new BadRequestHttpException('img cannot be empty');
        }

      
        $partner = new Partner();
        $partner->setName($name);
        $partner->setWebsite($website);

        define('UPLOAD_DIR', 'images/logo/');
        $partner->setImg($img);
        $img = $partner->getImg($img);
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = uniqid() . '.jpeg';
        $read = UPLOAD_DIR . $file;
        $success = file_put_contents($read, $data);
        $partner->setImg($file);

        
        $this->em->persist($partner);
        $this->em->flush();
        $data = $this->serializer->serialize($partner, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
    * @Rest\Get("/partners", name="findAllPartners")
    */
   public function findAllAction(): JsonResponse
   {
       $partners = $this->em->getRepository(Partner::class)->findBy([], ['id' => 'DESC']);
       $data = $this->serializer->serialize($partners, JsonEncoder::FORMAT);

       return new JsonResponse($data, Response::HTTP_OK, [], true);
   }

   /**
    * @Rest\Get("/admin/dashboard", name="findAllPartners2")
    */
   public function findAllAction2(): JsonResponse
   {
       $partners = $this->em->getRepository(Partner::class)->findBy([], ['id' => 'DESC']);
       $data = $this->serializer->serialize($partners, JsonEncoder::FORMAT);

       return new JsonResponse($data, Response::HTTP_OK, [], true);
   }

   /**
    * @Rest\Post("/admin/dashboard/partner/delete/{id}", name="deletePartner", methods={"DELETE"})
     */
    public function delete(Request $request, $id): JsonResponse
    {

        $em = $this->getDoctrine()->getManager();
        $partner = $em->getRepository(Partner::class)->find($id);
        
        $filename = $partner->getImg();

        $filesystem = new Filesystem();
        $filesystem->remove('images/logo/'.$filename);
        

        $em->remove($partner);
        $em->flush();

        $data = $this->serializer->serialize($partner, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }


    /**
     * @throws BadRequestHttpException
     *
     * @REST\RequestParam(name="name", description="partner name", nullable=true)
     * @REST\RequestParam(name="website", description="partner website", nullable=true)
     * @REST\RequestParam(name="img", description="partner logo", nullable=true)
     * @Rest\Post("/admin/dashboard/partner/edit/{id}", name="editPartner", methods={"GET","PATCH"})
     */
    public function edit(ParamFetcher $paramFetcher, $id): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $partner = $em->getRepository(Partner::class)->find($id);

        $name = $paramFetcher->get('name');
        $website = $paramFetcher->get('website');
        $img = $paramFetcher->get('img');

        if (trim($name) !== '') {
            if ($partner) {
                $partner->setName($name); 
            }
        }

        if (trim($website) !== '') {
            if ($partner) {
                $partner->setWebsite($website); 
            }
        }

        if (trim($img) !== '') {
            if ($partner) {
                define('UPLOAD_DIR', 'images/logo/');
                $img = str_replace('data:image/jpeg;base64,', '', $img);
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file = uniqid() . '.jpeg';
                $read = UPLOAD_DIR . $file;
                $success = file_put_contents($read, $data);
                $partner->setImg($file);
            }
        }

        $this->em->persist($partner);
        $this->em->flush();

        $data = $this->serializer->serialize($partner, JsonEncoder::FORMAT);
        
        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    
    }

   
   
}
