<?php
#Revision History
#Matheus Emidio (1931358) 2021-04-24 Created collection class

class collection
{
    #123           #car object 
    public $items = array();
    
    public function add($primary_key, $item)
    {
        $this->items[$primary_key] = $item;
    }
    
    public function remove($primary_key)
    {
        if(isset($this->items[$primary_key]))
        {
            unset($this->items[$primary_key]);
        }
    }
    
    public function get($primary_key)
    {
        if(isset($this->items[$primary_key]))
        {
            return $this->items[$primary_key];
        }
    }
    
    public function count()
    {
        return count($this->items);
    }
    
    
}