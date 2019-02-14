<?php

$test_case = '
    var i = 0;
    test(i);
    
    echo \'開
    始\';
    
    echo "終
    了。";
    
    /**
     * test 関数
     */
    function test(var hoge) {
        // test
        hoge++;
        retrun hoge;
    }
';


preg_match("|'(.*)'|s", $test_case, $match);
print_r($match);

preg_match('|"(.*)"|s', $test_case, $match);
print_r($match);

preg_match('|//.*\n|', $test_case, $match);
print_r($match);

preg_match('|(/\*(.*)\*/)|s', $test_case, $match);
print_r($match);


$test_case2 = 'test[dddtest.length -1] =test.i';
preg_match_all('/(.?)' . 'test' . '([^a-zA-Z0-9_:])/', $test_case2, $matches, PREG_SET_ORDER);
print_r($matches);

$test_case3 = 'test.prototype._p_test[test.length] = test.i;';
preg_match('|[^a-zA-Z0-9_](_p_[a-zA-Z0-9_]+)[^a-zA-Z0-9_]|', $test_case3, $match);
print_r($match);
