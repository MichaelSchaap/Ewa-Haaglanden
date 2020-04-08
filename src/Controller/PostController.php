<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
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
final class PostController extends AbstractController
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
     * @Rest\Post("/posts/dashboard/create", name="createPost")
     */
    public function createAction(Request $request): JsonResponse
    {

        $title = $request->request->get('title');
        if (empty($title)) {
            throw new BadRequestHttpException('title cannot be empty');
        }

        $content = $request->request->get('content');
        if (empty($content)) {
            throw new BadRequestHttpException('content cannot be empty');
        }

        $img = $request->request->get('img');
        if (empty($img)) {
            throw new BadRequestHttpException('img cannot be empty');
        }


        $post = new Post();
        $post->setTitle($title);
        $post->setContent($content);
        $post->setImg($img);

        $this->em->persist($post);
        $this->em->flush();
        $data = $this->serializer->serialize($post, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_CREATED, [], true);
    }

    /**
     * @Rest\Get("/posts", name="findAllPosts")
     */
    public function findAllAction(): JsonResponse
    {
        $posts = $this->em->getRepository(Post::class)->findBy([], ['id' => 'DESC']);
        $data = $this->serializer->serialize($posts, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }

    /**
     * @Rest\Get("/posts/dashboard", name="findAllPosts2")
     */
    public function findAllAction2(): JsonResponse
    {
        $posts = $this->em->getRepository(Post::class)->findBy([], ['id' => 'DESC']);
        $data = $this->serializer->serialize($posts, JsonEncoder::FORMAT);

        return new JsonResponse($data, Response::HTTP_OK, [], true);
    }
}
