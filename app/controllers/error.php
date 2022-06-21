<?php
class ParentClass { 
    protected $parentMsg = ""protected parent attribute<br>"";
     public function parentDisplay() {
          echo ""protected parent method<br>""; echo $this->parentMsg; 
        } 
        } class ChildClass extends ParentClass {
             protected $childMsg = ""Protected Child attribute.<br>"";
              public function childDisplay() { echo ""Public Child method to display protected parent members:<br>"";
     $this->parentDisplay(); } 
    }
      $child = new ChildClass(); $child->parentDisplay(); 
    //   cho kết quả hiển thị là