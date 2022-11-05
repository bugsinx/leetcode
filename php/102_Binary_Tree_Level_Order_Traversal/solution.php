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
        
        $queue = [];        
            
        array_push($queue,$root);
        
        $result_array = array();

        $level_arrays[$root->val]=0;
        
        while(count($queue)>0) {            
            $current = array_shift($queue);                        
                        
            if(isset($current)) {                                                                       
                $current_level = $levels_arrays[$current->val];
                
                if(isset($current->left)) {
                    array_push($queue,$current->left);
                    $levels_arrays[$current->left->val]=$current_level + 1;
                }
                if(isset($current->right)) {
                    array_push($queue,$current->right);
                    $levels_arrays[$current->right->val]=$current_level + 1;
                }
                
                if( empty($result_array[$current_level]) ) {
                    $result_array[$current_level]=array();                    
                }
                array_push($result_array[$current_level],$current->val);                                
                
            }
        }        
        return $result_array;
        
    }
}
