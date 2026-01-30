<?php

namespace EvaluationSampleCode;

class HtmlFormatHelper
{
    public function getBoldFormat(string $content): string
    {
        return "<b>$content</b>";
    }

    public function getItalicFormat(string $content): string
    {
        return "<i>$content</i>";
    }

    public function getFormattedListElements(array $contents): string
    {
        $htmlList = "<ul>";

        foreach ($contents as $x) {
            $htmlList .= "<li>";
            $htmlList .= $x;
            $htmlList .= "</li>";
        }

        $htmlList .= "</ul>";
        return $htmlList;
    }
}