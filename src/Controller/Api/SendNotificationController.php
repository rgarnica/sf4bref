<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Dto\SendNotificationRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class SendNotificationController
 *
 * @package App\Controller\Api
 *
 * @Route(
 *     methods={"POST"},
 *     name="app.notification.send",
 *     path="notification/send"
 * )
 */
final class SendNotificationController
{

    public function __invoke(Request $request, ValidatorInterface $validator, SerializerInterface $serializer)
    {
        $notificationRequest = SendNotificationRequest::fromRequestParameters($request->request->all());
        $violations = $validator->validate($notificationRequest);
        if (count($violations) > 0) {
            return new JsonResponse($serializer->normalize($violations), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse([
            'message' => 'Your request was processed!',
            'data' => [
                'email_sent' => $notificationRequest->getEmail(),
                'process_id' => md5(microtime()),
            ],
        ]);
    }

}
