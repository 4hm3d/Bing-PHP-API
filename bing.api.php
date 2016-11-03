<?php
/*
Project name

*/

class bing_api {

  private static $dork;
  private static $number_pages;
  private static $count;
  private static $timeout;
  private static $sub_links = TRUE;
  private static $current_search;
  private static $full_results = array();
  private static $links = array();


  public function __construct( $dork = "" , $number_pages = 1 , $count = 50, $sub_links = TRUE, $timeout = 30 )
  {
    self::$dork = $dork;
    self::$number_pages = $number_pages;
    self::$count = $count;
    self::$sub_links = $sub_links;
    self::$timeout = $timeout;
  }

  public function search()
  {
    for( $i = 0; $i < self::$number_pages; $i+=1 )
    {
      self::$current_search = self::main_curl(
        self::$dork, ($i*self::$count), self::$count, self::$timeout
      );
      self::$full_results = array_merge(
        self::$full_results,
        self::filter_results(
          self::$current_search[1]
          )
      );
    }
  }
  public function getLinks()
  {
    return self::$links;
  }
  public function getResults()
  {
    return self::$full_results;
  }
  public function setDork( $dork = "" )
  {
    self::$dork = $dork;
  }
  public function setPages( $pages = 1 )
  {
    self::$number_pages = $pages;
  }
  public function setCount( $count = 50 )
  {
    self::$count = ( $count <= 50 ) ? $count : 50;
  }
  public function setSubLinks( $option = TRUE )
  {
    self::$sub_links = $option;
  }
  private function filter_results( $source, $sub_links=TRUE )
  {
    $dom = new DOMDocument;
    @$dom->loadHTML($source);

    $finder = new DomXPath($dom);
    $all_class = iterator_to_array(
      $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' b_algo ')]")
    );
    $results = array();
    $a = 0;
    foreach( $all_class as $class )
    {
      $class = iterator_to_array( $class->getElementsByTagName('a') );
      $results[$a]['main']['title'] = $class[0]->textContent;
      $results[$a]['main']['url'] = $links[] = $class[0]->getAttribute('href');
      if ( $sub_links === TRUE )
      {
        for( $i=1; $i<count($class);$i++)
        {
          $results[$a]['sub']['title'] = $class[$i]->textContent;
          $results[$a]['sub']['url'] = $links[] = $class[$i]->getAttribute('href');
        }
      }
      $a+=1;
    }
    return $results;
  }

  private function main_curl( $dork, $page = 0, $count = 50, $timeout = 30 )
  {
  	$ch = curl_init();
    $ch_options = array(
      CURLOPT_URL => "http://www.bing.com/search?q=".urlencode($dork)."&first=".$page."&FORM=PERE&count=".$count,
      CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36",
      CURLOPT_FAILONERROR => FALSE,
      CURLOPT_SSL_VERIFYHOST => FALSE,
      CURLOPT_RETURNTRANSFER => TRUE,
      CURLOPT_FOLLOWLOCATION => TRUE,
      CURLOPT_TIMEOUT => $timeout
    );

  	curl_setopt_array($ch, $ch_options);

    $output = curl_exec($ch);
    $errors = curl_errno($ch);
    curl_close($ch);

    if($errors)
  	{
  		return array(FALSE, curl_strerror($errors) );
  	}else {
  	  return array(TRUE, $output );
  	}
  }


}

/*
Example:

$search = new bing_api("help");
$search->setDork('change dork');
$search->setCount(50);// number of results on each page
$search->setSubLinks(TRUE);// returns sublinks of the results if available

$search->search(); // start the search & extract the data

var_dump($search->getLinks()); // return the links only
var_dump($search->getResults()); // return the results ( title & link )
*/

$search = new bing_api("dork");
$search->setDork('linux');// change dork to linux
$search->setCount(50);// number of results on each page
$search->setSubLinks(TRUE);// returns sublinks of the results if available

$search->search(); // start the search & extract the data

var_dump($search->getLinks()); // return the links only
var_dump($search->getResults()); // return the results ( title & link )
 ?>
