<?php

namespace Chai17\Content;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class ContentController.
 */
class ContentControllerTest extends TestCase
{
    //
    public function testfilterText()
    {
        $contentController = new ContentController();
        $this->assertInstanceOf("\Chai17\Content\ContentController", $contentController);

        $res = $contentController->filterText("# markdown", "markdown");
        $exp = 'string';
        $this->assertInternalType($exp, $res);
    }
    //
    public function testindexActionGet()
    {
        $contentController = new ContentController();
        $this->assertInstanceOf("\Chai17\Content\ContentController", $contentController);

        $res = $contentController->indexActionGet();
        $exp = 'string';
        $this->assertInternalType($exp, $res);
    }
}
