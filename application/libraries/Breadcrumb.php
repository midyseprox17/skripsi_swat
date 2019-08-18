<?php
if (!defined('BASEPATH')) exit('No direct script access allowed!');
  
/**
 * @author Rijal Tanjung
 * 
 * @license MIT
 * 
 * @category Third Party Library for auto generated breadcrumb
 * 
 * @access Load the library, then $this->breadcrumb->generate()
 * 
 * @link https://github.com/devrijal/Codeigniter-auto-breadcrumb
 * 
 * Created since august 2015
 * 
 */

class Breadcrumb {
  public $ci;
  
  public function __construct()
  {
    $this->ci = &get_instance();
  }
  
  /**
   * @param string $total_segments  // count all uri segments and collect the uri data
   * @param string $title       // as the viewed url title
   * @param string $url       // generate the url till the current segments
   * @param array $segments     // collect all data of segments including the url for each segments
   * 
   * @return string Template $segments  // generate the view format and ready to parsed to view
   * 
   * @example echo $this->breadcrumb->generate()  // echo the script , then your breadcrumb is finish
   */
  public function generate()
  {
    $total_segments = $this->ci->uri->total_segments();
    
    for ($i=1; $i<=$total_segments; $i++){
      
      $url = base_url();
        
      for ($a=($total_segments-$i); $a<=$i; $a++) {
        $url .= $this->ci->uri->segment($a)."/";
      }
        
      $title =  ucwords(str_replace('_',' ' , $this->ci->uri->segment($i)));
      
      $segments[] = (object) array(
          'url' => $url,
          'title' => $title
      );
    }
    if(isset($segments))
    {
      return $this->template($segments);
    }
    
    return NULL;
  }
  
  /**
   * @param string $html        // create the template
   * @param array $segment      // the given data of url collection
   * @param string $optional_link   // static link if you need, will appear on the right side of the breadcrumb
   * 
   * @return string $html
   */
  function template($segment)
  {
    $tot_segment = count($segment);
    if($tot_segment > 2)
    {
      $judul = $segment[1]->title.' '.$segment[$tot_segment-1]->title;
    }else
    {
      $judul = $segment[$tot_segment-1]->title;
    }

    $html = '<div class="app-title">';
    $html .= '<div>';
    $html .= '<h1><i class="fa fa-exchange"></i> '.$judul.'</h1>';
    $html .= '<p>Halaman ini digunakan untuk '.$judul.'</p>';
    $html .= '</div>';
    $html .= '<ul class="app-breadcrumb breadcrumb side">';
    $html .= '<li class="breadcrumb-item"><a href="'.base_url().'">Beranda</a></li>';
    
    // $segment must be an array object
    for ($i=0; $i<$tot_segment; $i++) {
      $html .= '<li class="breadcrumb-item"><a href="'.$segment[$i]->url.'">'.$segment[$i]->title.'</a></li>';
    }
    $html .= '</ul>';
    $html .= '</div>';
    
    return $html;
  }
}