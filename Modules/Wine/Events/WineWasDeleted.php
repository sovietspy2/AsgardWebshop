<?php
/**
 * Created by PhpStorm.
 * User: sovietspy2
 * Date: 9/20/18
 * Time: 12:20 PM
 */

namespace Modules\MediaLinkExample\Events;
use Modules\Media\Contracts\DeletingMedia;
use Modules\Wine\Entities\Wine;
class WineWasDeleted implements DeletingMedia
{
    /**
     * @var Wine
     */
    private $wine;
    public function __construct(Wine $wine)
    {
        $this->wine = $wine;
    }
    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->wine->id;
    }
    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return get_class($this->wine);
    }
}