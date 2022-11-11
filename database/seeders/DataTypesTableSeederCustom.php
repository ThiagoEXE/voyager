<?php

namespace Database\Seeders;

use App\Http\Controllers\Voyager\Admin\PermissionController;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => __('voyager::seeders.data_types.user.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.user.plural'),
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'permissions');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'permissions',
                'display_name_singular' => 'Permission',
                'display_name_plural'   => 'Permissions',
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Permission',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
