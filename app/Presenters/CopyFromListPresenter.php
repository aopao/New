<?php

namespace App\Presenters;

/**
 * Class CopyFromListPresenter
 *
 * @package App\Presenters
 */
class CopyFromListPresenter
{
    /**
     * @param $array
     * @return string
     */
    public function getRadioHtml($array, $id = 0)
    {
        $html = '';
        if (! is_array($array)) {
            return $html;
        }
        foreach ($array as $key => $value) {
            if ($id == $value['id'] || $value['name'] == '黑马高考') {
                $radio = "checked='true'";
            } else {
                $radio = "";
            }
            $html .= '<input type="radio" '.$radio.' name="copyform_id" value="'.$value['id'].' " title="'.$value['name'].' ">';
        }

        return $html;
    }
}
