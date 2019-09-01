<?php
/**
 * Created by PhpStorm.
 * User: APSIS-M
 * Date: 10/13/2018
 * Time: 3:38 PM
 */

namespace App\Helpers;

use DB;
use Form;
use Html;

class ApsysHelper
{
    public static function common_in_combo($name, $sql, $where, $selected_value, $extra, $id_field, $value_field, $onchange = false)
    {
        $condtion = '';
        if ($where != NULL) {
            $condtion = " WHERE 1";
            foreach ($where as $key => $value) {
                $condtion .= " AND $key='$value'";
            }
        }
        $sql = $sql . $condtion;
        $query = DB::select(DB::raw($sql));
        $data = is_array($extra) && array_key_exists('multiple', $extra) ? array() : array('' => 'Select');
        $extra_str = '';
        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $extra_str .= $key . '="' . $value . '"';
            }
        }
        if ($onchange) {
            $extra_str = $extra_str . $onchange;
        }
        foreach ($query->result_array() as $value) {
            $data[$value[$id_field]] = $value[$value_field];
        }
        return Form::select($name, $data, $selected_value, $extra_str);
    }

    public static function __combo($slug = '', $data = array())
    {
        extract($data);
        $selected_value = isset($selected_value) && !empty($selected_value) ? $slug : '';
        $name = isset($name) && !empty($name) ? $name : '';
        $attributes = isset($attributes) && !empty($attributes) ? $attributes : [];
        $sql_query = isset($sql_query) && !empty($sql_query) ? $sql_query : '';
        if (!empty($slug)) {
            $combodata = DB::table('sys_dropdowns')->where('dropdown_slug', $slug)->first();
            if (!empty($combodata)) {
                $sql = $sql_query == '' ? $combodata->sqltext : $sql_query;
                $query = DB::select($sql);
                $option_data = array();
                $attr = '';
                $attributes = empty($attributes) ? array('class' => 'form-control multi') : $attributes;
                if (!empty($attributes)) {
                    foreach ($attributes as $key => $value) {
                        $attr .= $key . '="' . $value . '" ';
                    }
                }
                $multiple = isset($multiple) ? $multiple : $combodata->multiple;
                if ($multiple == '1') {
                    $attr .= 'multiple = "true"';
                } else {
                    $attr .= '';
                    $option_data[''] = "Choose Option";
                }
                if (empty($name)) {
                    $name = $combodata->dropdown_name;
                }
                foreach ($query as $value) {
                    $value_field = $combodata->value_field;
                    $option_field = $combodata->option_field;
                    $option_data[$value->$value_field] = $value->$option_field;
                }
                return Form::select($name, $option_data, $selected_value, (array)$attr);
            }
        }
    }

    public static function fileUpload($filename, $desstination, $request)
    {
        $data = array();
        $desstination = public_path() . '/' . $desstination;
        if ($request->hasfile($filename)) {
            foreach ($request->file($filename) as $file) {
                $name = date('Ymdhis') . $file->getClientOriginalName();
                $file->move($desstination, $name);
                $data[] = $name;
            }
        }
        return implode (", ", $data);

    }
}
