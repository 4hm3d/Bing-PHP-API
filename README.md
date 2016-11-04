# Bing PHP API
<h3>Example :</h3>
```
$search = new bing_api("help");
$search->setDork('apple');
$search->setCount(50);// number of results on each page
$search->setSubLinks(TRUE);// returns sublinks of the results if available

$search->search(); // start the search & extract the data

var_dump($search->getLinks()); // return the links only
var_dump($search->getResults()); // return the results ( title & link )
```
<h3>Output, full results:</h3>
```
[13]=>
array(2) {
  ["main"]=>
  array(3) {
    ["title"]=>
    string(17) "Apple - Wikipedia"
    ["description"]=>
    string(170) "The apple tree (Malus pumila, commonly and erroneously called Malus domestica) is a deciduous tree in the rose family best known for its sweet, pomaceous fruit, the apple"
    ["url"]=>
    string(35) "https://en.wikipedia.org/wiki/Apple"
  }
  ["sub"]=>
  array(3) {
    ["title"]=>
    string(11) "Cultivation"
    ["description"]=>
    string(0) ""
    ["url"]=>
    string(47) "https://en.wikipedia.org/wiki/Apple#Cultivation"
  }
}
```
<h3>Output, links only</h3>
```
array(71) {
  [0]=>
  string(21) "http://www.apple.com/"
  [1]=>
  string(26) "https://appleid.apple.com/"
  [2]=>
  string(25) "http://www.apple.com/mac/"
  [3]=>
  string(26) "https://support.apple.com/"
  [4]=>
  string(28) "http://www.apple.com/iphone/"
  [5]=>
  string(26) "http://www.apple.com/ipad/"
  [6]=>
  string(28) "http://www.apple.com/itunes/"
  [7]=>
  string(40) "https://en.wikipedia.org/wiki/Apple_Inc."
  [8]=>
  string(48) "https://en.wikipedia.org/wiki/Apple_Inc.#History"
  [9]=>
  string(49) "https://en.wikipedia.org/wiki/Apple_Inc.#Products"
  [10]=>
  string(59) "https://en.wikipedia.org/wiki/Apple_Inc.#Corporate_identity"
  [11]=>
  string(58) "https://en.wikipedia.org/wiki/Apple_Inc.#Corporate_affairs"
  [12]=>
  string(47) "http://www.marketwatch.com/investing/stock/aapl"
  [13]=>
  string(33) "http://finance.yahoo.com/q?s=AAPL"
  [14]=>...
```
