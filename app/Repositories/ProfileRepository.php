<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\BaseRepository;

/**
 * Class ProfileRepository
 * @package App\Repositories
 * @version January 5, 2022, 3:38 am UTC
*/

class ProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'avatar',
        'address',
        'birth_date',
        'properties'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Profile::class;
    }
}
