<?php

declare(strict_types=1);

namespace App\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class ConvertJsonBodyListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'convertJsonBodyToArrayParameters',
        ];
    }

    /**
     * When the body request is a encoded JSON, the data is processed into an array
     *
     * @param ControllerEvent $event
     * @return void
     */
    public function convertJsonBodyToArrayParameters(ControllerEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $request = $event->getRequest();

        if ($request->getContentType() !== 'json' || !$jsonData = $request->getContent()) {
            return;
        }

        $data = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new BadRequestHttpException(sprintf('Invalid JSON request body. Details: %s', json_last_error_msg()));
        }

        $request->request->replace($data ?? []);
    }

}
