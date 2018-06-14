<?php

namespace App\Presenters;

/**
 * Class AdminMenuListPresenter
 *
 * @package App\Presenters
 */
class AdminMenuListPresenter
{
    /**
     * @param $array
     * @return string
     */
    public function getSelectHtml($array, $id = 0)
    {
        $html = '';
        if (! is_array($array)) {
            return $html;
        }
        foreach ($array as $key => $value) {
            if ($value['level'] == 0) {
                $space = '';
            } else {
                $space = str_repeat("├ ", $value['level']);
            }
            if ($id == $value['id']) {
                $selected = "selected='true'";
            } else {
                $selected = "";
            }
            $html .= "<option {$selected} value=\"{$value['id']}\">".$space.$value['display_name']."</option>\n\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }

        return $html;
    }
}
