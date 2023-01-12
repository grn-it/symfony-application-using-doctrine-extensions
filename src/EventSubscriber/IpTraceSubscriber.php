<?php

namespace App\EventSubscriber;

use Gedmo\IpTraceable\IpTraceableListener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class IpTraceSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly IpTraceableListener $ipTraceableListener
    ) {}

    public function onKernelRequest(RequestEvent $event): void
    {
        $this->ipTraceableListener->setIpValue(
            $event->getRequest()->getClientIp()
        );
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }
}
