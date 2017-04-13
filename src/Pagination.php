<?php
/**
 * This class has written for building advanced and beautiful pagination output.
 * You can easily build your structure with just 2 lines.
 *
 * @package     Easy Pagination
 * @author      Ozan "sythdev" Akman <info@ozanakman.com.tr>
 * @version     0.1
 *
 */

namespace Akman;

class Pagination{

    private $rows;
    private $currentpage;
    private $gradual;
    private $gradual_limit;
    public $totalpages;
    public $limit;
    public $output;
    public $per;

    /**
     * @param $rows
     * @param $currentpage
     * @param $per
     * @param int $gradual
     */
    public function __construct($rows, $currentpage, $per, $gradual = 1, $gradual_limit = 3)
    {

        $this->rows             = $rows;
        $this->currentpage      = $currentpage;
        $this->per              = $per;
        $this->gradual          = $gradual;
        $this->gradual_limit    = $gradual_limit;
        $this->limit            = $this->limit();
        $this->totalpages       = $this->total();
        $this->output           = '';

    }

    /**
     * @return string
     */
    public function limit()
    {

        return ($this->currentpage - 1) * $this->per . ',' . $this->per;

    }

    /**
     * @return float
     */
    public function total()
    {

        return ceil($this->rows / $this->per);

    }


    public function build($link, $element, $item, $elementClass = NULL, $itemClass = NULL, $activeClass = 'active')
    {

        if($this->totalpages > 1){

            if($this->gradual == 1){

                $this->output   .= '<'.$element.' class="'.$elementClass.'">';

                if($this->currentpage > 1){
                    $this->output   .= '<'.$item.' class="'.$itemClass.'"><a href="'.$link.(1).'">&laquo;</a></'.$item.'>';
                    $this->output   .= '<'.$item.' class="'.$itemClass.'"><a href="'.$link.($this->currentpage - 1).'">&lsaquo;</a></'.$item.'>';
                }else{
                    $this->output   .= '<'.$item.' class="'.$itemClass.' disabled"><a>&laquo;</a></'.$item.'>';
                    $this->output   .= '<'.$item.' class="'.$itemClass.' disabled"><a>&lsaquo;</a></'.$item.'>';
                }

                for($i=$this->currentpage - $this->gradual_limit; $i < $this->currentpage + $this->gradual_limit; $i++){


                    if(($i > 0) AND ($i <= $this->totalpages)){

                        if($i == $this->currentpage){

                            $this->output   .= '<'.$item.' class="'.$itemClass.' '.$activeClass.'"><a href="'.$link.$i.'">'.$i.'</a></'.$item.'>';

                        }else{

                            $this->output   .= '<'.$item.' class="'.$itemClass.'"><a href="'.$link.$i.'">'.$i.'</a></'.$item.'>';

                        }

                    }


                }

                if($this->currentpage < $this->totalpages){

                    $this->output   .= '<'.$item.' class="'.$itemClass.'"><a href="'.$link.($this->currentpage + 1).'">&rsaquo;</a></'.$item.'>';
                    $this->output   .= '<'.$item.' class="'.$itemClass.'"><a href="'.$link.($this->totalpages).'">&raquo;</a></'.$item.'>';

                }else{

                    $this->output   .= '<'.$item.' class="'.$itemClass.' disabled"><a>&rsaquo;</a></'.$item.'>';
                    $this->output   .= '<'.$item.' class="'.$itemClass.' disabled"><a>&raquo;</a></'.$item.'>';

                }

                $this->output   .= '</'.$element.'>';

            }else{

                $this->output   .= '<'.$element.' class="'.$elementClass.'">';

                for($i=1;$i<=$this->totalpages;$i++){

                    if($i == $this->currentpage){

                        $this->output   .= '<'.$item.' class="'.$itemClass.' '.$activeClass.'"><a href="'.$link.$i.'">'.$i.'</a></'.$item.'>';

                    }else{

                        $this->output   .= '<'.$item.' class="'.$itemClass.'"><a href="'.$link.$i.'">'.$i.'</a></'.$item.'>';

                    }

                }

                $this->output   .= '</'.$element.'>';

            }

            return $this->output;

        }

    }

}
