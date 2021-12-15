<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Propriete;
use Authorization\IdentityInterface;

/**
 * Propriete policy
 */
class ProprietePolicy
{
    /**
     * Check if $user can add Propriete
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Propriete $propriete
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Propriete $propriete)
    {
        // All logged in users can create articles.
        return true;
    }

    /**
     * Check if $user can edit Propriete
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Propriete $propriete
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Propriete $propriete)
    {
        // logged in users can edit their own propriete.
        return $this->isAuthor($user, $propriete);
    }

    /**
     * Check if $user can delete Propriete
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Propriete $propriete
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Propriete $propriete)
    {
        // logged in users can delete their own propriete.
        return $this->isAuthor($user, $propriete);
    }

    protected function isAuthor(IdentityInterface $user, Propriete $propriete)
    {
        return $propriete->user_id === $user->getIdentifier();
    }

    /**
     * Check if $user can view Propriete
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Propriete $propriete
     * @return bool
     */
    public function canView(IdentityInterface $user, Propriete $propriete)
    {
        return $propriete->user_id === $user->getIdentifier();
    }
}
