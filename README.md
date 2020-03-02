# kata-markov-chain
randori structure based on : https://github.com/vdebes/kata-roman-numerals

## Performed as a randori
### Timeline
* 5min : briefing
* 5min : subject and resources reading
* 60min : coding
* 10min : debriefing / ROTI
### Rules
* **Iterate using TDD**
* Programming is done in pairs with navigator (defines the implementation) and driver (writes the code only)
* Each participant is navigator for 5min, at least one time.
* After 5min the navigator becomes driver and a new navigator steps in.
* At any point in time a navigator can decide to refactor.

#### Randori rules
1. if you are the navigator, you get to decide what to type
2. if you are the navigator and you don’t know what to
type, ask for help
3. if you are asked for help, kindly respond to the best of
your ability
4. if you are not asked, but you see an opportunity for
improvement or learning, choose an appropriate mo-
ment to mention it. This may involve waiting until the
next time all the tests pass (for design improvement
suggestions) or until the retrospective.

_Adapted to pair programming from [The Coding Dojo Handbook](https://leanpub.com/codingdojohandbook) by Emily Bache_

### Instruction

Instruction Markov chain [here](markov-chan.md) or [online](http://codingdojo.org/kata/MarkovChain/).

## Included tools
* ```make cs-fix``` [PHP-CS-Fixe](https://github.com/FriendsOfPHP/PHP-CS-Fixer) fixes the code style as the name implies.
* ```make static``` [PHPstan](https://github.com/phpstan/phpstan) is a static code analyzer. Usefull anytime but especially when refactoring. 
* ```make unit``` [PHPUnit](https://github.com/sebastianbergmann/phpunit/) is a unit test library. You need it to practice TDD. 

A first green test is included as a starting point for you to iterate.
