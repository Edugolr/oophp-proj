<?php

namespace Chai17\Content;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class ContentController.
 */
class ContentControllerTest extends TestCase
{
    // test filter
    public function testfilterText()
    {
        $contentController = new ContentController();
        $this->assertInstanceOf("\Chai17\Content\ContentController", $contentController);

        $res = $contentController->filterText("# markdown", "markdown");
        $exp = 'string';
        $this->assertInternalType($exp, $res);
    }
}
