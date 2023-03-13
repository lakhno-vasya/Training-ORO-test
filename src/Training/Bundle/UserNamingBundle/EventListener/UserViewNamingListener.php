<?php

namespace Training\Bundle\UserNamingBundle\EventListener;

use Oro\Bundle\UIBundle\Event\BeforeListRenderEvent;
use Oro\Bundle\UserBundle\Entity\User;

/**
 *  Listener for UserViewNaming
 */
class UserViewNamingListener
{
    /**
     * {@inheritdoc}
     */
    public function onUserView(BeforeListRenderEvent $event) : void
    {
        /** @var User $user */
        $user = $event->getEntity();
        if (!$user) {
            return;
        }

        $template = $event->getEnvironment()->render(
            '@TrainingUserNaming/User/namingData.html.twig',
            ['entity' => $user]
        );

        $subBlockId = $event->getScrollData()->addSubBlock(0);

        $event->getScrollData()->addSubBlockData(0, $subBlockId, $template);
    }
}
