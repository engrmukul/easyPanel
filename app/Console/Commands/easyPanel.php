<?php

namespace App\Console\Commands;

use App\Helpers\ApsysHelper;
use Illuminate\Console\Command;
use App\User;
use DB;
use URL;
use Auth;

class EasyPanel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'easy:panel{module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Console based module maker';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $moduleName = $this->argument('module');
        $tableList = DB::select('SHOW TABLES');
        $controllerDir = 'app/Http/Controllers/Master/';
        $modelDir = 'app/Models/Master/';
        $viewDir = 'resources/views/Master/';

        system("rm -rf " . escapeshellarg($controllerDir . ucfirst($moduleName)));
        system("rm -rf " . escapeshellarg($modelDir . ucfirst($moduleName)));
        system("rm -rf " . escapeshellarg($viewDir . ucfirst($moduleName)));

        /* Create Table If not Exist in Database */

        if ($this->confirm('Is ' . $moduleName . ' correct, do you wish to continue? [Y|N]')) {
            $table_name = $moduleName.'s';
            $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
                `" . $moduleName . "_id`  int(10) NOT NULL AUTO_INCREMENT ,
                `" . $moduleName . "_name`  varchar(150) NOT NULL ,
                `description`  text NOT NULL ,
                `created_by`  int(10) NULL ,
                `created_at`  datetime NULL ,
                `updated_by`  int(10) NULL ,
                `updated_at`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                `status`  enum('Active','Inactive') NULL DEFAULT 'Active' ,
                PRIMARY KEY (`" . $moduleName . "_id`)
            )";
            DB::select(DB::raw($sql));
            echo nl2br('Good Luck'. PHP_EOL);
        } else {
            $this->info(nl2br("Thanks try again!". PHP_EOL)); exit;
        }

        $fields = DB::select('DESCRIBE ' . $moduleName . 's');
        $form = '<form action="{{url("' . $moduleName . 's-list")}}"  id="' . $moduleName . '" type="POST" enctype="multipart/form-data">';
        $form .= '{{csrf_field()}}';
        $form .= '<input type="hidden" name="pkid" value="" id="pkid">';
        $thData = '';
        $dropDowns = array();
        $thArray = array();
        $joinTables = array();
        foreach ($fields as $field) {
            if (!in_array($field->Field, array('email_verified_at', 'remember_token', 'created_at', 'created_by', 'updated_at', 'updated_by'))) {
                $thData .= "'" . $field->Field . "',";
                array_push($thArray, $field->Field);
                $form .= '<div class="form-group  row"><label class="col-sm-2 col-form-label">' . ucwords(str_replace('_', ' ', $field->Field)) . '</label>';
                $form .= '<div class="col-sm-10">';
                if (explode('(', $field->Type)[0] == 'varchar' AND (explode('_', $field->Field)[0] != 'image'))
                    $form .= '<input type="text" name="' . $field->Field . '" value="" class="form-control ' . $field->Field . '" placeholder="Enter ' . $field->Field . '" required>';
                else if (explode('(', $field->Type)[0] == 'varchar' AND (explode('_', $field->Field)[0] == 'image')) {
                    $form .= '<input type="file" name="' . $field->Field . '" class="form-control ' . $field->Field . '" placeholder="Enter ' . $field->Field . '" required>';
                } else if (explode('(', $field->Type)[0] == 'int' AND explode('_', $field->Field)[1] != $moduleName.'s_id')
                    $form .= '<input type="number" name="' . $field->Field . '" value="" class="form-control ' . $field->Field . '" placeholder="Enter ' . $field->Field . '" required>';
                else if (explode('(', $field->Type)[0] == 'int' AND explode('_', $field->Field)[1] == $moduleName.'s_id') {
                    array_push($dropDowns, explode('_', $field->Field)[0]);
                    array_push($joinTables, $field->Field);
                    $form .= '{!! ApsysHelper::__combo($pageData[' . "'" . explode('_', $field->Field)[0] . "'" . '][\'combo_slug\'],$pageData[' . "'" . explode('_', $field->Field)[0] . "'" . '][\'combo_array\']) !!}';
                } else if ($field->Type == 'text' || $field->Type == 'longtext')
                    $form .= '<textarea class="form-control ' . $field->Field . ' " name="' . $field->Field . '"
                                         placeholder="Enter ' . ucfirst($field->Field) . '" required></textarea>';
                else
                    $form .= '';
                $form .= '<div class="help-block with-errors has-feedback"></div>';
                $form .= '</div>';
                $form .= '</div>';
            }
        }
        $thFinalData = substr($thData, 0, strlen($thData) - 1);
        $form .= '<div class="hr-line-dashed"></div>';
        $form .= '<div class="form-group row">';
        $form .= '<div class="col-sm-4 col-sm-offset-2">';
        $form .= '<button class="btn btn-primary btn-sm" type="submit">Save Data</button>';
        $form .= '</div>';
        $form .= '</div>';
        $form .= '</form>';

        $search = '<form action="{{url("' . ucfirst($moduleName) . '/index")}}"  id="' . $moduleName . '" type="POST" enctype="multipart/form-data">';
        $search .= '{{csrf_field()}}';
        foreach ($fields as $field) {
            if (!in_array($field->Field, array('email_verified_at', 'remember_token', 'created_at', 'created_by', 'updated_at', 'updated_by'))) {
                $search .= '<div class="form-group  row">';
                $search .= '<div class="col-sm-10">';
                if (explode('(', $field->Type)[0] == 'varchar' AND (explode('_', $field->Field)[0] != 'image'))
                    $search .= '<input type="text" name="' . $field->Field . '" value="" class="form-control ' . $field->Field . '" placeholder="Enter ' . $field->Field . '" >';
                else if (explode('(', $field->Type)[0] == 'int' AND explode('_', $field->Field)[1] != $moduleName.'s_id')
                    $search .= '<input type="number" name="' . $field->Field . '" value="" class="form-control ' . $field->Field . '" placeholder="Enter ' . $field->Field . '" >';
                else if (explode('(', $field->Type)[0] == 'int' AND explode('_', $field->Field)[1] == $moduleName.'s_id') {
                    //array_push($dropDowns, explode('_', $field->Field)[0]);
                    $search .= '{!! ApsysHelper::__combo($pageData[' . "'" . explode('_', $field->Field)[0] . "'" . '][\'combo_slug\'],$pageData[' . "'" . explode('_', $field->Field)[0] . "'" . '][\'combo_array\']) !!}';
                } else
                    $search .= '';
                $search .= '<div class="help-block with-errors has-feedback"></div>';
                $search .= '</div>';
                $search .= '</div>';
            }
        }
        $search .= '<div class="hr-line-dashed"></div>';
        $search .= '<div class="form-group row">';
        $search .= '<div class="col-sm-4 col-sm-offset-2">';
        $search .= '<button class="btn btn-primary btn-sm" type="submit">Search</button>';
        $search .= '<a href="{{url("' . $moduleName . 's")}}}"><button class="btn btn-primary btn-sm" type="submit">Reset</button></a>';
        $search .= '</div>';
        $search .= '</div>';
        $search .= '</form>';


        /**************************************
         *                                    *
         * Route                              *
         *                                    *
         **************************************/

        $handle = fopen('routes/web.php', 'a') or die('Cannot open file:  routes/web.php');
        $new_data = "\n Route::resource('" . $moduleName . "s', '" . "Master\\" . ucfirst($moduleName) . 'Controller' . "');";
        fwrite($handle, $new_data);


        /**************************************
         *                                    *
         * Controller                         *
         *                                    *
         **************************************/


        if (empty($dropDowns)) {
            $prosData = ucfirst($moduleName) . "::all(". $thFinalData . ")->sortByDesc('".$moduleName."s_id')->toArray()";
        } else {

            $combined = array_merge($thArray, $joinTables);
            $intersect = array_intersect($thArray, $joinTables);
            $th1 = array_diff($combined, $intersect);

            foreach ($th1 as &$value) {
                $value = $moduleName . 's.' . $value;
            }
            unset($value);
            $th2 = array();
            foreach ($joinTables as $index => $joinTable) {
                array_push($th2, $dropDowns[$index] . '.' . (DB::select('DESCRIBE ' . $dropDowns[$index]))[0]->Field . " " . $dropDowns[$index]);
            }
            $selectElements = array_merge($th1, $th2);

            $prosData = "\n" . "SELECT " . $moduleName . "s.id," . implode(',', $selectElements) . " FROM " . $moduleName . "s " . "\n";
            foreach ($joinTables as $key => $join) {
                $prosData .= "LEFT JOIN " . $dropDowns[$key] . " ON " . $dropDowns[$key] . ".id=" . $moduleName . "s." . $join . "\n";
            }
            $prosData = "DB::select(DB::raw( '" . $prosData . "' ))";

        }
        $controllerPage = fopen($controllerDir . ucfirst($moduleName) . 'Controller' . '.php', 'w') or die('Cannot open file:  Controller');
        $controllerContent = file_get_contents($controllerDir . 'EasyPanelControllers/controller.php');
        fwrite($controllerPage, $controllerContent);
        file_put_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php', str_replace('[module]', ucfirst($moduleName), file_get_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php')));
        file_put_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php', str_replace('[th]', $thFinalData, file_get_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php')));
        file_put_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php', str_replace('[tdata]', $prosData, file_get_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php')));

        /*$sys_master_grid['route_url'] = $moduleName.'s';
        $sys_master_grid['grid_slug'] = $moduleName;
        $sys_master_grid['grid_sql'] = $prosData;
        $sys_master_grid['page_name'] = $moduleName;
        $sys_master_grid['grid_name'] = $moduleName;
        DB::table('sys_master_grid')->insert($sys_master_grid);*/


        $rules = '';
        $save_data = '';
        foreach ($fields as $field) {
            if (!in_array($field->Field, array($moduleName.'s_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'status'))) {
                if (explode('_', $field->Field)[0] == 'image') {
                    $save_data .= '$fileStatus' . ' = ' . "ApsysHelper::fileUpload('" . $field->Field . "','" . ucfirst($moduleName) . "'," . "$" . "request)" . ";\n";
                    $save_data .= 'if(!empty($fileStatus)){';
                    $save_data .= '$record->' . $field->Field . ' = $fileStatus;';
                    $save_data .= '}else{';
                    $save_data .= '';
                    $save_data .= '}';
                } else {
                    $rules .= "'" . $field->Field . "' => 'required'" . ",\n";
                    $save_data .= '$record->' . $field->Field . ' = ' . '$request->' . $field->Field . ";\n";
                }
            }
        }
        $dropDownArray = '';
        if (!empty($dropDowns)) {
            foreach ($dropDowns as $dropDown) {
                $dropDownArray .= "'$dropDown' => [";
                $dropDownArray .= "'combo_slug' => '" . $dropDown . "',";
                $dropDownArray .= "'combo_array' => array('selected_value' => '','name' => '" . $dropDown . "_id','attributes' => array('class' => 'form-control " . $dropDown . "_id', 'id' => 'module_sort'),'multiple' => 0)";
                $dropDownArray .= "],";
            }
        }

        file_put_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php', str_replace('[save_data]', $save_data, file_get_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php')));
        file_put_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php', str_replace('[rules]', $rules, file_get_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php')));
        file_put_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php', str_replace('[dropdown]', $dropDownArray, file_get_contents($controllerDir . ucfirst($moduleName) . 'Controller' . '.php')));


        /*Model*/
        $modelPage = fopen($modelDir . ucfirst($moduleName) . '.php', 'w') or die('Cannot open file:  Controller');
        $modelContent = file_get_contents($modelDir . 'EasyPanelModels/model.php');
        fwrite($modelPage, $modelContent);
        file_put_contents($modelDir . ucfirst($moduleName) . '.php', str_replace('[module]', $moduleName, file_get_contents($modelDir . ucfirst($moduleName) . '.php')));

        /*View*/

        mkdir($viewDir . ucfirst($moduleName), 0777, true);
        $listPage = fopen($viewDir . ucfirst($moduleName) . '/list.blade.php', 'w') or die('Cannot open file:  list');
        $listConent = file_get_contents($viewDir . 'EasyPanelTemplate/list.blade.php');
        fwrite($listPage, $listConent);
        file_put_contents($viewDir . ucfirst($moduleName) . '/list.blade.php', str_replace('[module]', 'replace', file_get_contents($viewDir . ucfirst($moduleName) . '/list.blade.php')));

        $newPage = fopen($viewDir . ucfirst($moduleName) . '/new.blade.php', 'w') or die('Cannot open file:  new');
        $newConent = $form;
        fwrite($newPage, $newConent);
        file_put_contents($viewDir . ucfirst($moduleName) . '/new.blade.php', str_replace('[module]', 'replace', file_get_contents($viewDir . ucfirst($moduleName) . '/new.blade.php')));

        $viewPage = fopen($viewDir . ucfirst($moduleName) . '/view.blade.php', 'w') or die('Cannot open file:  new');
        $viewConent = file_get_contents($viewDir . 'EasyPanelTemplate/view.blade.php');
        fwrite($viewPage, $viewConent);
        //file_put_contents($viewDir . ucfirst($moduleName) . '/view.blade.php', str_replace('[module]', 'replace', file_get_contents($viewDir . ucfirst($moduleName) . '/view.blade.php')));

        $searchPage = fopen($viewDir . ucfirst($moduleName) . '/search.blade.php', 'w') or die('Cannot open file:  new');
        $searchConent = file_get_contents($viewDir . 'EasyPanelTemplate/search.blade.php');
        fwrite($searchPage, $searchConent);
        file_put_contents($viewDir . ucfirst($moduleName) . '/search.blade.php', str_replace('[search]', $search, file_get_contents($viewDir . ucfirst($moduleName) . '/search.blade.php')));

        $sampleimportPage = fopen($viewDir . ucfirst($moduleName) . '/sampleimport.blade.php', 'w') or die('Cannot open file:  new');
        $sampleimportConent = file_get_contents($viewDir . 'EasyPanelTemplate/sampleimport.blade.php');
        fwrite($sampleimportPage, $sampleimportConent);
        file_put_contents($viewDir . ucfirst($moduleName) . '/sampleimport.blade.php', str_replace('[module]', 'replace', file_get_contents($viewDir . ucfirst($moduleName) . '/sampleimport.blade.php')));

        echo $this->info('Your ' . ucfirst($moduleName) . ' module  developed. Browse ' . URL::to('easyPanel/' . $moduleName) . 's' . "\n");


    }
}
