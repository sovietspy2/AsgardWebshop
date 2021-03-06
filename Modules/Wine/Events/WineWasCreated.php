<?php
/**
 * Created by PhpStorm.
 * User: sovietspy2
 * Date: 9/20/18
 * Time: 12:14 PM
 */

namespace Modules\Wine\Events;
use Modules\Media\Contracts\StoringMedia;
use Modules\Wine\Entities\Wine;
class WineWasCreated implements StoringMedia
{
    /**
     * @var Wine
     */
    private $wine;
    /**
     * @var array
     */
    private $data;
    public function __construct(Wine $wine, array $data)
    {
        $this->wine = $wine;
        $this->data = $data;
    }
    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->wine;
    }
    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}