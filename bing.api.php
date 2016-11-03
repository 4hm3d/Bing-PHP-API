<?php
/*
Project name
*/

class bing_api {

  public static $dork;
  public static $number_pages;
  public static $search;
  private static $full_results = array();
  private static $links = array();


  public function __construct( $dork, $number_pages = 1 )
  {
    self::$dork = $dork;
    self::$number_pages = $number_pages;
    self::$search = self::search('apple');
    self::filter_results(self::$search[1]);
  }
  function filter_results( $source )
  {
    $first_regex = '/ class="(b_algo|deeplink_title)">.*?<a href="(.*?)" h=".*?">(.*?)<\/a>/';
    if ( preg_match_all( $first_regex, $source,  $matches ) )
    {
      $results = array();
      for( $i=0;$i<count($matches[2]);$i++ )
      {
        $results[] = array(
          'url'=>$matches[1][$i],
          'title'=>
            str_replace( '<strong>','',
              str_replace('</strong>', '', $matches[2][$i])
            )
          );
      }
      var_dump($results);
      return $results;
    }
  }

  function search( $dork, $page = 0, $count = 50 )
  {
  	$ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://www.bing.com/search?q=".urlencode($dork)."&first=".$page."&FORM=PERE&count=".$count);
  	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36");
  	curl_setopt($ch, CURLOPT_FAILONERROR, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  	curl_setopt($ch, CURLOPT_TIMEOUT, 30);

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


$search = new bing_api("help");

 ?>
