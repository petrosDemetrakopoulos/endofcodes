![Build status](https://travis-ci.org/dionyziz/endofcodes.png?branch=master)

*End of Codes* is a game for programmers. You play the game by programming a bot which will play for you.

About the game
==============
The game is a 2D turn-based strategy game where all players play against all others. Every evening, a game takes place.
Each player is assigned some creatures on the 2D map, which they can move around. Creatures can attack enemy creatures.
Each creature attacked loses health points until it dies. The last player to remain alive wins.

When the game is ready, you can play on [endofcodes.com](http://endofcodes.com/).

Contributors
============
End of Codes was developed by:

 * Vitalis Salis <vitsalis@gmail.com>
 * Dimitris Lamprinos <pkakelas@gmail.com>
 * Dionysis Zindros <dionyziz@gmail.com>

If you're interested in contributing, just fork, fix a bug or build a feature, and pull request.

Blog
====
You can read more about the development of the game on our [blog](http://blog.endofcodes.com)

Technology
==========
End of Codes is written in HTML, CSS, Javascript, PHP, and MySQL. We require:

 * PHP 5.5+
 * MySQL
 * Apache

PHP 5.5 is required because we use array-access-after-definition. PHP 5.4 is required because we use JSON notation
for arrays. PHP 5 is required because we use OOP5 features.

End of Codes has been tested under MySQL 5.5 and 5.6 and Apache 2.2, but it may work with other versions also.

License
=======
MIT. See the file [LICENSE](https://github.com/dionyziz/endofcodes/blob/master/LICENSE).
