# Create strong and reliable passphrase.

The package based on the idea of [EFF Dice-Generated Passphrases](https://www.eff.org/dice). It can let you easily generate a human-friendly and memorable password suggestion for your user and also you can use it as a password recovery token.

## Installation

You may use Composer to install passphrase package into your PHP project:

```
composer require lizhineng/passphrase
```

## Usage

```
use Zhineng\Passphrase\ArrayRepository;
use Zhineng\Passphrase\Passphrase;

$passphrase = new Passphrase(new ArrayRepository);

$passphrase->make();  // it-will-return-a-strong-passphrase
```

Passphrase initializer accepts a word repository, the example above use an array repository that comes along with the package.

To generate a new random passphrase simply call `make` method. Without any customization, it will give you a 6-word, dash-seperated passphrase.

### Words Customization

The default passphrase consists of 6 words, sometimes you want a shorter or longer one. Just simply call `words` method with your desired words counting:

```
// generate a passphrase containing 5 words.
$passphrase->words(5);
```

### Seperator Customization

The default seperator to glue random words is a dash character `-`, if you want to change it, simply call `seperatedBy` method with the seperator:

```
// generate a passphrase like, it_will_return_a_strong_passphrase
$passphrase->seperatedBy('_');
```

---

Don't forget the methods are chainable, let's say if you want a 6-word, colon-seperated passphrase, you could rewrite the code as the following:

```
$passphrase->words(6)
    ->seperatedBy(':')
    ->make();
```
