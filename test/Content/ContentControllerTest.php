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
         $ContentController = new ContentController();
         $this->assertInstanceOf("\Chai17\Content\ContentController", $ContentController);

         $res = $ContentController->filterText("# markdown", "markdown");
         $exp = 'string';
         $this->assertInternalType($exp, $res);
     }
     //
     public function testindexActionGet()
     {
         $ContentController = new ContentController();
         $this->assertInstanceOf("\Chai17\Content\ContentController", $ContentController);

         $res = $ContentController->indexActionGet();
         $exp = 'string';
         $this->assertInternalType($exp, $res);
     }
}
