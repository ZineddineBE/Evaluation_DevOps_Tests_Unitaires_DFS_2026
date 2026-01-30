<?php

namespace SimpleProject\UnitTests;

require_once 'HtmlFormatHelper.php'; 

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestWith;
use EvaluationSampleCode\HtmlFormatHelper; 

final class HtmlFormatHelperTest extends TestCase
{
    private HtmlFormatHelper $htmlFormatHelper;


    protected function setUp(): void
    {          
        $this->htmlFormatHelper = new HtmlFormatHelper();
    }

    #[TestWith(["Hello World", "<b>Hello World</b>"])]
    #[TestWith(["Titre", "<b>Titre</b>"])]
    #[TestWith(["Texte en gras", "<b>Texte en gras</b>"])]
    public function testGetBoldFormat_GivenString_ShouldReturnCorrectString(string $content, string $expectedResult): void
    {
        $result = $this->htmlFormatHelper->getBoldFormat($content);

        $this->assertSame($expectedResult, $result);
    }

    #[TestWith(["Hello World", "<i>Hello World</i>"])]
    #[TestWith(["Titre", "<i>Titre</i>"])]
    #[TestWith(["Texte en italic", "<i>Texte en italic</i>"])]
    public function testGetItalicFormat_GivenString_ShouldReturnCorrectString(string $content, string $expectedResult): void
    {
        $result = $this->htmlFormatHelper->getItalicFormat($content);

        $this->assertSame($expectedResult, $result);
    }

    #[TestWith([ ["Élément"], "<ul><li>Élément</li></ul>" ])]
    #[TestWith([ ["Football", "Anime", "Jeux-vidéos"], "<ul><li>Football</li><li>Anime</li><li>Jeux-vidéos</li></ul>" ])]
    public function testGetFormattedListElements_GivenList_ShouldReturnCorrectString(array $contents, string $expectedResult): void
    {
        $result = $this->htmlFormatHelper->getFormattedListElements($contents);

        $this->assertSame($expectedResult, $result);
    }
    
}