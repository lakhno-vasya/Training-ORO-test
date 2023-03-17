<?php

namespace Training\Bundle\UserNamingBundle\Twig;

use Oro\Bundle\UserBundle\Entity\User;

use Training\Bundle\UserNamingBundle\Provider\UserFullNameProvider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UserNamingExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('full_name_example', [UserFullNameProvider::class, 'getFullNameExample'])
        ];
    }
}
