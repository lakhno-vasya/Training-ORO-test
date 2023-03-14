<?php

namespace Training\Bundle\UserNamingBundle\Twig;

use Oro\Bundle\UserBundle\Entity\User;

use Training\Bundle\UserNamingBundle\Provider\UserFullNameProvider;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UserNamingExtension extends AbstractExtension
{
    public function __construct(private UserFullNameProvider $fullNameProvider)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('full_name_filter', [$this, 'getFullNameForFilter'])
        ];
    }

    /**
     * @param string $format
     * @return string
     */
    public function getFullNameForFilter(string $format): string
    {
        $user = new User();
        $user->setNamePrefix('User')
            ->setFirstName('John')
            ->setMiddleName('Jon')
            ->setLastName('Doe')
            ->setNameSuffix('Sr');

        return $this->fullNameProvider->getFullName($user, $format);
    }
}
