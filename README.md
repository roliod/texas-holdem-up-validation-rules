# Texas Hold'em Up Validator Rule Engine

[![Build Status](https://travis-ci.com/roliod/texas-holdem-up-validation-rules.svg?token=xLWRR38GPhFQuvaZTh9c&branch=master)](https://travis-ci.com/roliod/texas-holdem-up-validation-rules)

A Texas Hold’em poker hands validation rule engine in PHP.

# Installation

### Prerequisites
PHP version >= 7.2

### Install Package

In order to install this package can either add it directly to your `composer.json`:

```json
{
  "require": {
    "roliod/texas-holdem-up-validation-rules": "^1.1.1"
  }
}
```

OR

`composer require roliod/texas-holdem-up-validation-rules`

# Quick Start

This package followings the [Standard Poker Hand Ranking rules](https://www.fgbradleys.com/et_poker.asp). 

In order to get the rank of a list of hands using this package, you will need to do the following.

```php
<?php
declare(strict_types=1);

$evaluator = \Roliod\TexasHUPoker\Evaluate(PATH_TO_TXT_FILE);
$rankingList = $evaluator->rank();

print_r($rankingList);
```

### Sample TXT File Content

Here is a sample txt file content acceptable by the package:

```text
10❤ 10♦ 10♠ 9♣ 9♦
4♠ J♠ 8♠ 2♠ 9♠
3♦ J♣ 8♠ 4❤ 2♠
7♣ 7♦ 7♠ K♣ 3♦
A❤ A♦ 8♣ 4♠ 7❤
J❤ J♦ J♠ J♣ 7♦
8♣ 7♣ 6♣ 5♣ 4♣
9♣ 8♦ 7♠ 6♦ 5❤
4♣ 4♠ 3♣ 3♦ Q♣
A♦ K♦ Q♦ J♦ 10♦
```