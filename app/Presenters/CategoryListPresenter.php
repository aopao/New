<?php

namespace App\Presenters;

/**
 * Class CategoryListPresenter
 *
 * @package App\Presenters
 */
class CategoryListPresenter
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
            $html .= "<option {$selected} value=\"{$value['id']}\">".$space.$value['name']."</option>\n\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }

        return $html;
    }
}
