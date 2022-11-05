/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        
        if(!isset($root)) {
            return [];
        }
        
        $root->level = 0;
        $queue =array($root);        
                
        $result_array = array();
              
        while(count($queue)>0) {            
            $current = array_shift($queue);                        
                        
            if(isset($current)) {                                                                                       
                if(isset($current->left)) {
                    $current->left->level = $current->level + 1;
                    array_push($queue,$current->left);                    
                }
                if(isset($current->right)) {
                    $current->right->level = $current->level + 1;
                    array_push($queue,$current->right);                    
                }
                
                if( empty($result_array[$current->level]) ) {
                    $result_array[$current->level]=array();   
                }
                array_push($result_array[$current->level],$current->val);                                
                
            }
        }        
        return $result_array;
        
    }
}
