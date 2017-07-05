# Bing PHP API
### Example :

```PHP
$search = new bing_api("help");
$search->setDork('apple');
$search->setCount(50);// number of results on each page
$search->setSubLinks(TRUE);// returns sublinks of the results if available

$search->search(); // start the search & extract the data

var_dump($search->getLinks()); // return the links only
var_dump($search->getResults()); // return the results ( title & link )
```

```
array(39) {
  [0]=>
  array(2) {
    ["main"]=>
    array(3) {
      ["title"]=>
      string(5) "Apple"
      ["description"]=>
      string(167) "Discover the innovative world of Apple and shop everything iPhone, iPad, Apple Watch, Mac, and Apple TV, plus explore accessories, entertainment, and expert device ..."
      ["url"]=>
      string(22) "https://www.apple.com/"
    }
    ["sub"]=>
    array(3) {
      ["title"]=>
      string(6) "iTunes"
      ["description"]=>
      string(73) "iTunes. Your music, movies, and TV shows take center stage. iTunes is ΓÇª"
      ["url"]=>
      string(29) "https://www.apple.com/itunes/"
    }
  }
  [1]=>
  array(1) {
    ["main"]=>
    array(3) {
      ["title"]=>
      string(34) "Fashion Fair - Apple Store - Apple"
      ["description"]=>
      string(89) "Apple Store Fashion Fair store hours, contact information, and weekly calendar of events."
      ["url"]=>
      string(41) "https://www.apple.com/retail/fashionfair/"
    }
  }
  [2]=>
  array(2) {
    ["main"]=>
    array(3) {
      ["title"]=>
      string(22) "Apple Inc. - Wikipedia"
      ["description"]=>
      string(166) "Apple Inc. is an American multinational technology company headquartered in Cupertino, California that designs, develops, and sells consumer electronics, computer ..."
      ["url"]=>
      string(40) "https://en.wikipedia.org/wiki/Apple_Inc."
    }
    ["sub"]=>
    array(3) {
      ["title"]=>
      string(17) "Corporate affairs"
      ["description"]=>
      string(0) ""
      ["url"]=>
      string(58) "https://en.wikipedia.org/wiki/Apple_Inc.#Corporate_affairs"
    }
  }
```

### Output, links only

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

